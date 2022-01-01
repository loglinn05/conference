<div class = "shares" style = "margin: 0px;">
	<a
		href = "http://www.facebook.com/sharer/sharer.php?
		u=<?= $share['link'] ?>
		&quote=<?= $share['text'] ?>"
		target = "_blank"
		onclick = "
			window.open(
			this.href,
			'',
			'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'
			);
			return false;
		"
		>
		<div class = "facebook share-block">
			<i class = "fab fa-facebook" aria-hidden = "true"></i>
		</div>
	</a>
	<a
		href = "http://twitter.com/share?
			&url=<?= $share['link'] ?>
			&text=<?= $share['text'] ?>"
		target = "_blank"
		onclick = "
			window.open(
			this.href,
			'',
			'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'
			);
			return false;
		"
		>
		<div class = "twitter share-block">
			<i class = "fab fa-twitter" aria-hidden = "true"></i>
		</div>
	</a>
</div>
<br>
<div>
	<p class = "text-center m-0">
		<a id = "all_members_button" class = "btn btn-lg btn-rounded" href = "/all_members"></a>
	</p>
	<p class = "text-center m-0">
		<button id = "return_to_the_form_button" class = "btn btn-lg btn-rounded" onclick = "returnToTheForm()">
			Return to the form
		</button>
	</p>
</div>