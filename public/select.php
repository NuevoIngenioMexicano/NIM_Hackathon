<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

if (isset($_GET['idJob']) && isset($_GET['min']) && isset($_GET['max']) && isset($_GET['location'])) {
	$result = 
}
?>
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
									<p>¿En donde necesitas el servicio?</p>
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
				        <div class="stepper done">
				            <div class="stepper-step">
				                <i class="icon stepper-step-icon">check</i>
				                <span class="stepper-step-num">2</span>
				            </div>
				            <span class="stepper-text">Establece un rango de precios</span>
				        </div>
				        <div class="stepper done">
				            <div class="stepper-step">
				                <i class="icon stepper-step-icon">check</i>
				                <span class="stepper-step-num">3</span>
				            </div>
				            <span class="stepper-text">¿En donde necesitas el servicio?</span>
				        </div>
				        <div class="stepper active">
				            <div class="stepper-step">
				                <i class="icon stepper-step-icon">check</i>
				                <span class="stepper-step-num">4</span>
				            </div>
				            <span class="stepper-text">Elige un resultado</span>
				        </div>
				    </div>
				</div>
				<?php
				for ($i = 0; $i < 3; $i++) {
					echo '<div class="col-lg-4 col-sm-6">
							<div class="card">
								<div class="card-main">
									<div class="card-header">
										<div class="card-header-side pull-left">
											<div class="avatar">
												<img alt="John Smith Avatar" src="images/users/avatar-001.jpg">
											</div>
										</div>
										<div class="card-inner">
											<span class="card-heading">Some Text!</span>
										</div>
									</div>
									<div class="card-img">
										<img alt="alt text" src="images/samples/landscape.jpg" style="width: 100%;">
										<p class="card-img-heading">Some Text!</p>
									</div>
									<div class="card-inner">
										<p>
											Lorem ipsum dolor sit amet.<br>
											Consectetur adipiscing elit.
										</p>
									</div>
									<div class="card-action">
										<div class="card-action-btn pull-left">
											<a class="btn btn-flat waves-attach" href="javascript:void(0)"><span class="icon">check</span>&nbsp;Contactar</a>
										</div>
									</div>
								</div>
							</div>
						</div>';
				}
				?>
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