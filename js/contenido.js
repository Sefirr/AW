$(document).ready(function(){
	$("#tittle").change(function(){
		if ( textovalido($("#tittle").val() ) ) {
		// Ocultar icono rojo
		$("#imgtittle").hide();
		$("#imgtittle")[0].src="../img/form/ok.png";
		// Mostrar icono verde
		$("#imgtittle").show();
		} else {
		// Ocultar icono verde

		$("#imgtittle").hide();

		$("#imgtittle")[0].src="../img/form/no.png";

		// Mostrar icono rojo

		$("#imgtittle").show();
		}
	});
	
	$("#sinopsis").change(function(){
		if ( textovalido2($("#sinopsis").val() ) ) {
		// Ocultar icono rojo
		$("#imgsinopsis").hide();
		$("#imgsinopsis")[0].src="../img/form/ok.png";
		// Mostrar icono verde
		$("#imgsinopsis").show();
		} else {
		// Ocultar icono verde

		$("#imgsinopsis").hide();

		$("#imgsinopsis")[0].src="../img/form/no.png";

		// Mostrar icono rojo

		$("#imgsinopsis").show();
		}
	});
	
	$("#descripciones").change(function(){
		if ( textovalido2($("#descripciones").val() ) ) {
		// Ocultar icono rojo
		$("#imgdescripcion").hide();
		$("#imgdescripcion")[0].src="../img/form/ok.png";
		// Mostrar icono verde
		$("#imgdescripcion").show();
		} else {
		// Ocultar icono verde

		$("#imgdescripcion").hide();

		$("#imgdescripcion")[0].src="../img/form/no.png";

		// Mostrar icono rojo

		$("#imgdescripcion").show();
		}
	});
	
	
	////////////////////////// Verificacion del nombre  del director//////////////////////////
	$("#director").change(function(){ 

		if ( textovalido($("#director").val() ) ) {
		//Ocultar iconos
		$("#imgdirect").hide();
		$("#imgdirect")[0].src="../img/form/ok.png";

		//Mostrar Icono verde
		$("#imgdirect").show();
		}else{
		//Ocultar icono verde
		$("#imgdirect").hide();
		$("#imgdirect")[0].src="../img/form/no.png";



		//Mostrar icono rojo

		$("#imgdirect").show();

		}


	});




	////////////////////////// Verificacion de la fecha //////////////////////////
	$("#fecha").change(function(){
		if(fechavalido($("#fecha").val() ) ){
		//Ocultar iconos
		$("#imgfecha").hide();
		$("#imgfecha")[0].src="../img/form/ok.png";

		//Mostrar Icono verde
		$("#imgfecha").show();
		}else{
		//Ocultar icono verde
		$("#imgfecha").hide();
		$("#imgfecha")[0].src="../img/form/no.png";



		//Mostrar icono rojo

		$("#imgfecha").show();
		

		} 

	});
	

});


function textovalido(id){

expr = /^([a-z ñáéíóú]{2,60})$/i;
    if ( !expr.test(id) )
        return false;
    else
    	return true;

}
function textovalido2(id){

expr = /^([a-z ñáéíóú]{2,3500})$/i;
    if ( !expr.test(id) )
        return false;
    else
    	return true;

}

function fechavalido(id){

expr = /^(0?[1-9]|[12][0-9]|3[01])[\-](0?[1-9]|1[012])[\-](19|20)\d{2}$/;
    if ( !expr.test(id) )
        return false;
    else
    	return true;


}