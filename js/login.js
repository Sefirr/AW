// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
	box.hide();
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    
});
