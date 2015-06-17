
$(document).ready(function(){
	var page = $_GET('page');
	var request = $.get("includes/procesaIndex.php?page=" + page,loadPage);




});

function loadPage(data) {
	$("#contenido").html(data);

}

function $_GET( name ){
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp ( regexS );
	var tmpURL = window.location.href;
	var results = regex.exec( tmpURL );

	if( results == null )
		return"";
	else
		return results[1];
}
