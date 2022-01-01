<!DOCTYPE html>
<html>
	<head>
		<title>Conference</title>
		<meta charset = 'UTF-8'>
		<meta name = 'viewport' content = 'width=device-width, initial-scale=1, shrink-to-fit=no'>
		<meta http-equiv = 'x-ua-compatible' content = 'ie=edge'>
		<link rel = "stylesheet" type = "text/css" href = "<?= css("reset") ?>">
		<link rel = 'stylesheet' href = 'https://use.fontawesome.com/releases/v5.11.2/css/all.css'>
		<link href = 'https://fonts.googleapis.com/css?family=Noto+Sans&display=swap' rel = 'stylesheet'>
		<link rel = "stylesheet" type = "text/css" href = "<?= css("bootstrap.min") ?>">
		<link rel = "stylesheet" type = "text/css" href = "<?= css("mdb.min") ?>">
		<link rel = "stylesheet" type = "text/css" href = "<?= css("intl_tel_input.min") ?>">
		<link rel = "stylesheet" type = "text/css" href = "<?= css("preloader") ?>">
		<link rel = "stylesheet" type = "text/css" href = "<?= css("header") ?>">
		<link rel = "stylesheet" type = "text/css" href = "<?= css("general") ?>">
		<link rel = "stylesheet" type = "text/css" href = "<?= css("form") ?>">
		<link rel = "stylesheet" type = "text/css" href = "<?= css("members_list") ?>">
	</head>
	<body>
		<div class = "preloader">
			<div class = "preloader__row">
				<div class = "preloader__item"></div>
				<div class = "preloader__item"></div>
			</div>
		</div>
		<header>
			<nav class = "navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
				<div class = "container">
					<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarSupportedContent-7" aria-controls = "navbarSupportedContent-7" aria-expanded = "false" aria-label = "Toggle navigation">
					<span class = "navbar-toggler-icon"></span>
					</button>
					<div class = "collapse navbar-collapse" id = "navbarSupportedContent-7">
						<ul class = "navbar-nav mr-auto">
							<li class = "nav-item mr-5">
								<a class = "nav-link" href = "/">Conference Participation Form</a>
							</li>
							<li class = "nav-item">
								<a class = "nav-link " href = "/all_members">Members List</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class = "view" style = "background-image: url('/public/images/header.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
				<div class = "mask rgba-black-light align-items-center">
					<div class = "container">
						<div class = "row">
							<div class = "col-md-12 mb-4 white-text text-center">
								<table style = "width: 100%; height: 100vh;">
									<tbody>
										<tr>
											<td class = "align-middle">
												<h1 class = "h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay = "0.3s">
												<strong>Conference</strong>
												</h1>
												<hr class = "hr-light my-4 wow fadeInDown" data-wow-delay = "0.4s">
												<h5 class = "text-uppercase mb-4 white-text wow fadeInDown" data-wow-delay = "0.4s">
												<strong>Participate In The Conference</strong>
												</h5>
												<a class = "btn btn-outline-white wow fadeInDown" href = "/" data-wow-delay = "0.4s">Conference Participation Form</a>
												<a class = "btn btn-outline-white wow fadeInDown" href = "/all_members" data-wow-delay = "0.4s">Members List</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>