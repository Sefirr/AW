// JavaScript Document
	$(document).ready(function(){
		var titulo = $_GET('title');
		$("#imgvaloracion").hide();
		$.get("../includes/procesaValoracion.php?do=numVotos&title=" + titulo,process);
	});
		
		// get rating function
		function process(result){
			if(result == 0) {
				insertRating();
			} else {
				getRating();
			}
		}	
		
		function getRating(){
			var titulo = $_GET('title');
			$.ajax({
				type: "GET",
				url: "../includes/procesaValoracion.php",
				data: "do=getrate&title=" + titulo,
				cache: false,
				async: false,
				success: function(result) {
					$("#star-rating").hide();
					if(result == 0) {
						$("#imgvaloracion")[0].src="../img/0estrellas.png";
					} else if(result == 1) {
						$("#imgvaloracion")[0].src="../img/1estrellas.png";
					} else if(result == 2) {
						$("#imgvaloracion")[0].src="../img/2estrellas.png";
					} else if(result == 3) {
						$("#imgvaloracion")[0].src="../img/3estrellas.png";
					} else if(result == 4) {
						$("#imgvaloracion")[0].src="../img/4estrellas.png";
					} else if(result == 5) {
						$("#imgvaloracion")[0].src="../img/5estrellas.png";
					}

					$("#imgvaloracion").show();
				},
				error: function(result) {
					alert("some error occured, please try again later");
				}
			});
		}
		
		function insertRating(){
			// link handler
			var titulo = $_GET('title');
			$('#ratelinks li a').click(function(){
				$.ajax({
					type: "GET",
					url: "../includes/procesaValoracion.php",
					data: "rating="+$(this).text()+"&do=rate&title=" + titulo,
					cache: false,
					async: false,
					success: function(result) {
						// remove #ratelinks element to prevent another rate
						$("#ratelinks").remove();
						// get rating after click
						getRating();
					},
					error: function(result) {
						alert("some error occured, please try again later");
					}
				});
				
			});
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