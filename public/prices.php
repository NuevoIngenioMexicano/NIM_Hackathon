
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Yeah!</title>

	<!-- css -->
	<link href="css/base.min.css" rel="stylesheet">
	<link href="css/project.min.css" rel="stylesheet">
	
	<!-- favicon -->
	<!-- ... -->
</head>
<body class="page-brand">
	<header class="header header-transparent header-waterfall ui-header">
		<ul class="nav nav-list pull-left">
			<li>
				<a data-toggle="menu" href="#ui_menu">
					<span class="icon icon-lg">menu</span>
				</a>
			</li>
		</ul>
		<a class="header-logo header-affix-hide margin-left-no margin-right-no" data-offset-top="213" data-spy="affix" href="index.html">Yeah!</a>
	</header>
	<nav aria-hidden="true" class="menu" id="ui_menu" tabindex="-1">
		<div class="menu-scroll">
			<div class="menu-content">
				<a class="menu-logo" href="index.html">Material</a>
				<ul class="nav">
					<li>
						<a class="collapsed waves-attach" data-toggle="collapse" href="#ui_menu_samples">Sample Pages</a>
						<ul class="menu-collapse collapse" id="ui_menu_samples">
							<li>
								<a class="waves-attach" href="page-login.html">Login Page</a>
							</li>
							<li>
								<a class="waves-attach" href="page-picker.html">Picker Page</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<main class="content">
		<div class="content-header ui-content-header">
			<div class="container">
				
			</div>
		</div>
		<div class="container">
			<section class="content-inner margin-top-no">
				<div class="row">
					<div class="col-lg-8 col-md-9">
						<div class="card margin-bottom-no">
							<div class="card-main">
								<div class="card-inner">
									<p>Rango de Precios</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="stpper-horiz">
				    <div class="stepper-horiz-inner">
				        <div class="stepper done">
				            <div class="stepper-step">
				                <i class="icon stepper-step-icon">check</i>
				                <span class="stepper-step-num">1</span>
				            </div>
				            <span class="stepper-text">¿Qué necesitas?</span>
				        </div>
				        <div class="stepper active">
				            <div class="stepper-step">
				                <i class="icon stepper-step-icon">check</i>
				                <span class="stepper-step-num">2</span>
				            </div>
				            <span class="stepper-text">Establece un rango de precios</span>
				        </div>
				        <div class="stepper">
				            <div class="stepper-step">
				                <i class="icon stepper-step-icon">check</i>
				                <span class="stepper-step-num">3</span>
				            </div>
				            <span class="stepper-text">¿En donde necesitas el servicio?</span>
				        </div>
				        <div class="stepper">
				            <div class="stepper-step">
				                <i class="icon stepper-step-icon">check</i>
				                <span class="stepper-step-num">4</span>
				            </div>
				            <span class="stepper-text">Elige un resultado</span>
				        </div>
				    </div>
				</div>
				<div class="card-inner">
					<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
						<div class="card-inner">
							<form class="form" action="#" method="POST">
								<div class="form-group form-group-label">
									<div class="row">
										<div class="col-md-10 col-md-push-1">
											<label class="floating-label" for="ui_price_min">Precio minimo $50.00</label>
											<input class="form-control" name="ui_price_min" type="text">
										</div>
									</div>
								</div>
								<div class="form-group form-group-label">
									<div class="row">
										<div class="col-md-10 col-md-push-1">
											<label class="floating-label" for="ui_price_max">Precio maximo $300.00</label>
											<input class="form-control" name="ui_price_max" type="text">
										</div>
									</div>
								</div>
								<div class="form-group form-group-label">
									<div class="row">
										<div class="col-md-10 col-md-push-1">
											<input type="submit" class="btn btn-brand" value="Siguiente" name="next">
										</div>
									</div>
								</div>
							</form>
							<?php
							if (isset($_POST['next'])) {
								$idJob = $_GET['idJob'];
								if (is_numeric($_POST['ui_price_min'])) {
									$min = $_POST['ui_price_min'];
								}
								if (is_numeric($_POST['ui_price_max'])) {
									$max = $_POST['ui_price_max'];
								}
								$path = 'where.php?idJob='.$idJob.'&min='.$min.'&max='.$max;
								echo '<script>window.location.href = \''.$path.'\';</script>';
							}
							?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</main>
	<footer class="ui-footer">
		<div class="container">
			<p>Copyleft 2016</p>
		</div>
	</footer>

	<!-- js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="js/base.min.js"></script>
	<script src="js/project.min.js"></script>
</body>
</html>