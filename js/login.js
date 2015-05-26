// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
	form.hide();
    button.mouseup(function(login) {
        form.toggle();
        button.toggleClass('active');
    });
    
});
