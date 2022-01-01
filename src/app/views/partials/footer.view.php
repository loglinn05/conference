<footer class = "page-footer font-small pt-4">
	<div class = "container">
		<div class = "row d-flex justify-content-center">
			<?php for($i = 1; $i <= 6; $i++) { ?>
			<div class = "d-inline-flex col-xl-2 col-lg-3 col-sm-4 col-6 mb-4 justify-content-center">
				<div class = "view overlay z-depth-1-half" style = "height: auto;">
					<img src = "/public/images/fi_<?= $i ?>.jpg" class = "img-fluid" alt = "footer image <?= $i ?>">
					<a href = "#!">
						<div class = "mask rgba-white-light"></div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class = "footer-copyright text-center py-3">© <?= date('Y') ?> Copyright:
		<a href = "mailto:loglinn05@gmail.com"> loglinn05@gmail.com</a>
	</div>
</footer>
<script type = "text/javascript" src = "<?= js("jquery.min") ?>"></script>
<script type = "text/javascript" src = "<?= js("popper.min") ?>"></script>
<script type = "text/javascript" src = "<?= js("bootstrap.min") ?>"></script>
<script type = "text/javascript" src = "<?= js("mdb.min") ?>"></script>
<script type = "text/javascript" src = "<?= js("intl_tel_input.min") ?>"></script>
<script type = "text/javascript" src = "<?= js("preloader") ?>"></script>
<script type = "text/javascript" src = "<?= js("navigation") ?>"></script>
<script type = "text/javascript" src = "<?= js("form") ?>"></script>
<script type = "text/javascript">
	new WOW().init();
</script>
</body>
</html>