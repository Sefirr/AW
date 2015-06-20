$(document).ready(function(){
	$("#nombre").change(function(){
		if ( textovalido($("#nombre").val() ) ) {
		// Ocultar icono rojo
		$("#imgname").hide();
		$("#imgname")[0].src="../img/form/ok.png";
		// Mostrar icono verde
		$("#imgname").show();
		} else {
		// Ocultar icono verde

		$("#imgname").hide();

		$("#imgname")[0].src="../img/form/no.png";

		// Mostrar icono rojo

		$("#imgname").show();
		}
	});
	
	$("#descripciones").change(function(){
		if ( textovalido($("#descripciones").val() ) ) {
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
	$("#proveedor").change(function(){ 

		if ( textovalido($("#proveedor").val() ) ) {
		//Ocultar iconos
		$("#imgproveedor").hide();
		$("#imgproveedor")[0].src="../img/form/ok.png";

		//Mostrar Icono verde
		$("#imgproveedor").show();
		}else{
		//Ocultar icono verde
		$("#imgproveedor").hide();
		$("#imgproveedor")[0].src="../img/form/no.png";



		//Mostrar icono rojo

		$("#imgproveedor").show();

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

function fechavalido(id){

expr = /^(0?[1-9]|[12][0-9]|3[01])[\-](0?[1-9]|1[012])[\-](19|20)\d{2}$/;
    if ( !expr.test(id) )
        return false;
    else
    	return true;


}

