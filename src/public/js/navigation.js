$(document).ready(function() {
	regExp = /\/\w*((_|\-)[\w]+)*/g;
	$("nav .container .navbar-collapse .navbar-nav .nav-item .nav-link[href='" + document.location.href.match(regExp)[document.location.href.match(regExp).length - 1] + "']").parent().addClass("active");
});