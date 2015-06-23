
$(document).ready(function(){
	var page = $_GET('page');
	var envio = $('#search').val();
	
	$('#search_form').submit(function(e){
		e.preventDefault();
	})
	
	if(envio == "") {	
		$.get("includes/procesaIndex.php?search="+envio+"&page=" + page,loadPage);
	}

	$('#search').keyup(function(){
		var page = $_GET('page');
		var envio = $('#search').val();

		$.ajax({
			type: 'POST',
			url: 'includes/procesaIndex.php',
			data: ('search='+envio+'&page='+page),
			success: function(resp){
				if(envio == "") {
					$.get("includes/procesaIndex.php?search="+envio+"&page=" + page,loadPage);
				} else {
				if(resp!=""){
					$('#contenido').html(resp);
				}
				}
			}
		})
	})



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
