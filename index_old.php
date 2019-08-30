<?php session_start(); ?>
<html>
	<head>
		<title>Viva Admin | Login</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	
	  	<link rel="stylesheet" href="css/normalize.css">
	  	<link rel="stylesheet" href="css/jquery-ui.css">
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  	<link rel="stylesheet" href="css/style.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	
	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
	  	
	</head>
	<body>
		<header>
			<div id="linea"></div>
		</header>
		<div class="container-flex">
			<section id="primero">
				<div class="row">
						<h3 class="vivashango">VIVA ADMIN</h3>
				</div>
				<div class="row">
					<div class="col-md-6" style="margin: 0 auto;">
						<h2>Ingreso</h2>
						<form role="form" name="login" action="php/login.php" method="post">
			  				<div class="form-group">
			    				<label for="username">Nombre de usuario o email</label>
			    				<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
			  				</div>
			 				<div class="form-group">
			    				<label for="password">Contrase&ntilde;a</label>
			    				<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
			  				</div>
			  				<button type="submit" class="btn btn-success">Ingresar</button>
						</form>
					</div>
				</div>
			</section>
		</div>
		<section>
			<div id="linea"></div>
		</section>
		<script src="js/valida_login.js"></script>
	</body>
</html>