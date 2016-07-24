
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Login - Material</title>

	<!-- css -->
	<link href="css/base.min.css" rel="stylesheet">
	<link href="css/project.min.css" rel="stylesheet">

	<!-- favicon -->
	<!-- ... -->
</head>
<body class="page-brand">
	<header class="header header-brand ui-header">
		<span class="header-logo"></span>
	</header>
	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
					<section class="content-inner">
						<div class="card">
							<div class="card-main">
								<div class="card-header">
									<div class="card-inner">
										<h1 class="card-heading">Registrar</h1>
									</div>
								</div>
								<div class="card-inner">
									<form class="form" action="class/register.php">
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="ui_login_username">Username</label>
													<input class="form-control" id="ui_login_username" type="text">
												</div>
											</div>
										</div>
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="ui_login_password">Password</label>
													<input class="form-control" id="ui_login_password" type="password">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<button class="btn btn-block btn-brand waves-attach waves-light">Sign In</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
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