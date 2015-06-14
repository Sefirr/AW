$(document).ready(function(){
	$("#nick").change(function(){
		var nombre = $("#nick").val();
		$.post('includes/check_usuario.php', {'nombre': nombre}, usuarioExiste);
	});
	$("#email2").change(function(){
		if ( correoValido($("#email2").val() ) ) {
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

	$("#name").change(function(){ 
		if ( textovalido($("#name").val() ) ) {
		//Ocultar iconos
		$("#imgname").hide();
		$("#imgname")[0].src="./img/form/ok.png";

		//Mostrar Icono verde
		$("#imgname").show();
		}else{
		//Ocultar icono verde
		$("#imgname").hide();
		$("#imgname")[0].src="./img/form/no.png";



		//Mostrar icono rojo

		$("#imgname").show();

		}

	});



	$("#lastname").change(function(){
		if(textovalido($("#lastname").val() ) ){
		//Ocultar iconos
		$("#imglastname").hide();
		$("#imglastname")[0].src="./img/form/ok.png";

		//Mostrar Icono verde
		$("#imglastname").show();
		}else{
		//Ocultar icono verde
		$("#imglastname").hide();
		$("#imglastname")[0].src="./img/form/no.png";



		//Mostrar icono rojo

		$("#imglastname").show();
		

		} 

	});


	//verificacion de contraseña

	$("#password").change(function(){
		if(passwordvalido($("#password").val())){
			
			$("#imgpassword").hide();
			$("#imgpassword")[0].src="./img/form/ok.png";

			//Mostrar Icono verde
			$("#imgpassword").show();

		}else{
			$("#imgpassword").hide();
			$("#imgpassword")[0].src="./img/form/no.png";



			//Mostrar icono rojo

			$("#imgpassword").show();



		}
	});










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

function passwordvalido(id){

expr = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/;
    if ( !expr.test(id) )
        return false;
    else
    	return true;


}

function usuarioExiste(data, status) {
	if ( data == true ) {
		$("#imgnick").hide();
		$("#imgnick")[0].src="./img/form/no.png";



		//Mostrar icono rojo

		$("#imgnick").show();
	
	}else{
		//Ocultar icono verde
	
		//Ocultar iconos
		$("#imgnick").hide();
		$("#imgnick")[0].src="./img/form/ok.png";

		//Mostrar Icono verde
		$("#imgnick").show();

	}

}
