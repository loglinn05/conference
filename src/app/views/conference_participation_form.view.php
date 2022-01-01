<?php view("partials/header"); ?>
<main style = "padding-bottom: 5em;">
	<div class = "container">
		<div class = "row">
			<div class = "col-12" style = "padding-left: 0px !important; padding-right: 0px !important;">
				<iframe src = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6607.5234528850215!2d-118.343684!3d34.101244!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2s7060%20Hollywood%20Blvd%2C%20Los%20Angeles%2C%20CA%2090028%2C%20USA!5e0!3m2!1sen!2sua!4v1612539299989!5m2!1sen!2sua" width = "100%" height = "450" frameborder = "0" allowfullscreen = "" aria-hidden = "false" tabindex = "0"></iframe>
			</div>
		</div>
	</div>
	<div id = "conference_wrapper" class = "container-fluid">
		<div class = "row">
			<div class = "col-lg-3 col-md-2 col-sm-1 col-0"></div>
			<div id = "conference" class = "col-lg-6 col-md-8 col-sm-10 col-12 py-5">
				<h1 class = "text-center font-weight-bold h1-responsive">To participate in the conference, please fill out the form:</h1>
				<div class = "tab">
					<?php view("partials/form_first_step"); ?>
				</div>
				<div class = "tab">
					<?php view("partials/form_second_step"); ?>
				</div>
				<div class = "social-buttons m-auto">
					<?php view("partials/social_buttons", ["share" => App\Core\App::get("share")]); ?>
				</div>
				<?php view("partials/form_navigation"); ?>
			</div>
			<div class = "col-lg-3 col-md-2 col-sm-1 col-0"></div>
		</div>
	</div>
</main>
<?php view("partials/footer"); ?>