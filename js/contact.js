$(document).ready(function(){
	$("#email").change(function(){
	if ( correoValido($("#email").val() ) ) {
	// Ocultar icono rojo
	$("#imgemail").hide();
	$("#imgemail")[0].src="./img/form/ok.png";
	// Mostrar icono verde
	$("#imgemail").show();
	} else {
	// Ocultar icono verde

	$("#imgemail").hide();

	$("#imgemail")[0].src="./img/form/no.png";

	// Mostrar icono rojo

	$("#imgemail").show();
	}
	});
	////////////////////////// Verificacion del nombre //////////////////////////
	$("#name").change(function(){ 

		if ( textovalido($("#name").val() ) ) {
		//Ocultar iconos
		$("#imgname").hide();
		$("#imgname")[0].src="./img/form/ok.png";

		//Mostrar Icono verde
		$("#imgname").show();
		}else{
		//Ocultar icono verde
		$("imgname").hide();
		$("imgname")[0].src="./img/form/no.png";



		//Mostrar icono rojo

		$("imgname").show();

		}


	});




	////////////////////////// Verificacion del apellido //////////////////////////
	$("#lastname").change(function(){
		if(textovalido($("#lastname").val() ) ){
		//Ocultar iconos
		$("#imglastname").hide();
		$("#imglastname")[0].src="./img/form/ok.png";

		//Mostrar Icono verde
		$("#imglastname").show();
		}else{
		//Ocultar icono verde
		$("imglastname").hide();
		$("imglastname")[0].src="./img/form/no.png";



		//Mostrar icono rojo

		$("imglastname").show();

		}


			


	});
	$("#borrar").onclick(function(){
		$("imglastname").hide();
		$("imgname").hide();
		$("#imgemail").hide();
		$("#enviar").hide();

	});
	
	enviando("#email", "#name", "#lastname");

});


function correoValido(id){

expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(id) )
        return false;
    else
    	return true;
}

function textovalido(id){

expr = /^([a-z ñáéíóú]{2,60})$/i;
    if ( !expr.test(id) )
        return false;
    else
    	return true;

}

function enviando(email, nombre, apellido){


if (textovalido(nombre) && textovalido(apellido) && correoValido(email)){

	$("#enviar").show();

}else{

	$("#enviar").hide();

}



}