<?php

//
// Funciones genéricas de gestión de formularios
//

/* Gestión de token CSRF está basada en: https://www.owasp.org/index.php/PHP_CSRF_Guard
 */

/**
 * Sufijo para el nombre del parámetro de la sesión del usuario donde se almacena el token CSRF.
 */
define('CSRF_PARAM', 'csrf');

/**
 * Se encarga de orquestar todo el proceso de creación y procesamiento de un formulario web.
 *
 * @param string $formId Cadena utilizada como valor del atributo "id" de la etiqueta &lt;form&gt; asociada al formulario y como parámetro a comprobar para verificar que el usuario ha enviado el formulario.
 *
 * @param callable $generaCamposFormulario Función que devuelve un <code>string</code> con el HTML necesario para presentar los campos del formulario. Es necesario asegurarse que como parte del envío se envía un parámetro con nombre <code$formId</code> (i.e. utilizado como valor del atributo name del botón de envío del formulario).
 *
 * @param callable $procesaFormulario Función que procesa los datos del formulario.
 *
 * @param string $action (opcional) URL asociada al atributo "action" de la etiqueta &lt;form&gt; del fomrulario y que procesará el envío del formulario. Por defecto la URL es $_SERVER['PHP_SELF']
 *
 * @param string $class (opcional) Valor del atributo "class" de la etiqueta &lt;form&gt; asociada al formulario. Si este parámetro incluye la cadena "nocsrf" no se generá el token CSRF para este formulario.
 *
 * @param string enctype (opcional) Valor del parámetro enctype del formulario.
 */
function formulario($formId, $generaCamposFormulario, $procesaFormulario, $action=null, $class=null, $enctype=null) {

  if ( !$action ) {
    $action = $_SERVER['PHP_SELF'];
  }
  
  /* Se valida la existencia de sendas funciones necesarias para generar, validar y procesar el formulario
   */  
  if ( ! is_callable($generaCamposFormulario) ) {
    throw new Exception('Se esperaba una función en $generaCamposFormulario');
  }
  
  if ( ! is_callable($procesaFormulario) ) {
    throw new Exception('Se esperaba una función en $procesaFormulario');
  }
  
  if ( ! formularioEnviado($_POST, $formId) ) {
    echo generaFormulario($formId, $generaCamposFormulario, $action, $class, $enctype);
  } else {
    // Valida el token CSRF si es necesario (hay un token en la sesión asociada al formulario)
    $tokenRecibido = isset($_POST['CSRFToken']) ? $_POST['CSRFToken'] : FALSE;
    
    if ( ($errores = csrfguard_ValidateToken($formId, $tokenRecibido)) !== TRUE ) { 
      echo generaFormulario($formId, $generaCamposFormulario, $action, $class, $enctype, $errores, $_POST);
    } else  {
      $result = $procesaFormulario($_POST);
      if ( is_array($result) ) {
        // Error al procesar el formulario, volvemos a mostrarlo
        echo generaFormulario($formId, $generaCamposFormulario, $action, $class, $enctype, $result, $_POST);
      } else {
        header('Location: '.$result);
      }
    }
  }  
}

/**
 * Función que verifica si el usuario ha enviado el formulario. Comprueba si existe el parámetro <code>$formId</code> en <code>$params</code>.
 *
 * @param array $params Array que contiene los datos recibidos en el envío formulario.
 *
 * @param string $formId Nombre del parámetro a verificar.
 *
 * @return boolean Devuelve <code>TRUE</code> si <code>$formId</code> existe como clave en <code>$params</code>
 */
function formularioEnviado(&$params, $formId) {
  return isset($params[$formId]);
} 

/**
 * Función que genera el HTML necesario para el formulario.
 *
 * @param string $formId Cadena utilizada como valor del atributo "id" de la etiqueta &lt;form&gt; asociada al formulario y como parámetro a comprobar para verificar que el usuario ha enviado el formulario.
 *
 * @param string $action URL asociada al atributo "action" de la etiqueta &lt;form&gt; del fomrulario y que procesará el envío del formulario.
 *
 * @param string $class Valor del atributo "class" de la etiqueta &lt;form&gt; asociada al formulario. Si este parámetro incluye la cadena "nocsrf" no se generá el token CSRF para este formulario.
 *
 * @param string enctype (opcional) Valor del parámetro enctype del formulario.
 *
 * @param array $errores (opcional) Array con los mensajes de error de validación y/o procesamiento del formulario.
 *
 * @param array $datos (opcional) Array con los valores por defecto de los campos del formulario.
 */
function generaFormulario($formId, $generaCamposFormulario, $action, $class, $enctype = null, $errores = array(), &$datos = array()) {

  $html= '';
  $numErrores = count($errores);
  if (  $numErrores == 1 ) {
    $html .= "<div class='error'><ul><li>".$errores[0]."</li></ul></div>";
  } else if ( $numErrores > 1 ) {
    $html .= "<div class='error'><ul><li>";
    $html .= implode("</li><li>", $errores);
    $html .= "</li></ul></div>";
  }

  $html .= '<form method="POST" action="'.$action.'" id="'.$formId.'"';
  if ( $class ) {
    $html .= ' class="'.$class.'"';
  }
  if ( $enctype ) {
    $html .= ' enctype="'.$enctype.'"';
  }
  $html .=' >';
  
  // Se genera el token CSRF si el usuario no solicita explícitamente lo contrario.
  if ( ! $class || strpos($class, 'nocsrf') === false ) {
    $tokenValue = csrfguard_GenerateToken($formId);
    $html .= '<input type="hidden" name="CSRFToken" value="'.$tokenValue.'" />';
  }

  $html .= $generaCamposFormulario($datos);
  $html .= '</form>';
  return $html;
}

function csrfguard_GenerateToken($formId) {
  if ( ! isset($_SESSION) ) {
    throw new Exception('La sesión del usuario no está definida.');
  }
  
	if ( function_exists('hash_algos') && in_array('sha512', hash_algos()) ) {
		$token = hash('sha512', mt_rand(0, mt_getrandmax()));
	}	else {
		$token=' ';
		for ($i=0;$i<128;++$i) {
			$r=mt_rand(0,35);
			if ($r<26){
				$c=chr(ord('a')+$r);
			}	else{ 
				$c=chr(ord('0')+$r-26);
			} 
			$token.=$c;
		}
	}

  $_SESSION[$formId.'_'.CSRF_PARAM]=$token;

	return $token;
}

function csrfguard_ValidateToken($formId, $tokenRecibido) {
  if ( ! isset($_SESSION) ) {
    throw new Exception('La sesión del usuario no está definida.');
  }
  
  $result = TRUE;
  if ( isset($_SESSION[$formId.'_'.CSRF_PARAM]) ) {
    if ( $_SESSION[$formId.'_'.CSRF_PARAM] !== $tokenRecibido ) {
      $result = array();
      $result[] = 'Has enviado el formulario dos veces';
    }
    $_SESSION[$formId.'_'.CSRF_PARAM] = ' ';
    unset($_SESSION[$formId.'_'.CSRF_PARAM]);
  } else {
    $result = array();
    $result[] = 'Formulario no válido';
  }
	return $result;
}
?>
