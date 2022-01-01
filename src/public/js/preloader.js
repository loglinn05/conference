window.onload = function() {
	document.body.classList.add('hiding');
	window.setTimeout(function() {
		document.body.classList.add('hidden');
		document.body.classList.remove('hiding');
	}, 500);
}