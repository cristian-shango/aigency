<?php
	include "session.php";
	mysql_set_charset('utf8');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viva Admin | Menú Principal</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	
	  	<link rel="stylesheet" href="css/normalize.css">
	  	<link rel="stylesheet" href="css/jquery-ui.css">
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  	<link rel="stylesheet" href="css/style.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	
	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/popper.min.js"></script>
	  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	  	
	</head>
	<body>
		<header>
			<div id="linea"></div>
		</header>
		<div class="container-flex">
			<section id="primero">
				<div class="row">
					<div class="col-md-6 text-left">
						<h3 class="vivashango">VIVA ADMIN</h3>
					</div>
					<div class="col-md-6 text-right">
						<h3 style="font-size: 3em;">Menú Principal</h3>
						<h2>Nivel de Acceso: <?php echo $_SESSION["nivel_acceso"]; ?> </h2>
					</div>
				</div>

				<?php
					if ($_SESSION["nivel_acceso"] == 2 OR $_SESSION["nivel_acceso"] == 3){
				?>
					<div class="row text-center">
						<div class="col-md-3">
							<a href="proyectos.php"><i class="fas fa-tasks icono_grande" id="boton_proyectos"><h4>Proyectos Aprobados</h4></i></a>
						</div>
						<div class="col-md-3">
							<a href="pedido_cotizacion.php"><i class="fas fa-folder-plus icono_grande" id="boton_proyectos"><h4>Pedido de Cotización</h4></i></a>
						</div>
						<div class="col-md-3">
							<a href="cotizaciones.php"><i class="fas fa-folder-open icono_grande" id="boton_registros"><h4>Carga de Cotizaciones</h4></i></a>
						</div>
						<div class="col-md-3">
							<a href="administracion.php"><i class="fas fa-check icono_grande"><h4>Administración</h4></i></a>
						</div>
						
					</div>
					<div class="row text-center" style="padding-top: 2em;">
						<div class="col-md-3">
							<a href="proyeccion.php"><i class="fas fa-chart-line icono_grande" id="boton_registros"><h4>Proyección</h4></i></a>
						</div>
						<div class="col-md-3">
							<a href="proveedores.php"><i class="fas fa-question-circle icono_grande"><h4>Proveedores</h4></i></a>
						</div>
						<div class="col-md-3">
							<a href="clientes.php"><i class="fas fa-users icono_grande" id="boton_clientes"><h4>Clientes</h4></i></a>
						</div>
						<div class="col-md-3">
							<i class="fas fa-cog disable icono_grande"><h4>Usuarios</h4></i>
						</div>
					</div>
					<div class="row text-center" style="padding-top: 2em;">
						<div class="col-md-3">
							<a href="agenda.php"><i class="far fa-calendar-alt icono_grande" id="boton_registros"><h4>Agenda</h4></i></a>
						</div>
						<div class="col-md-12">
							<a href="php/logout.php"><i class="fas fa-sign-out-alt icono_grande" id="salir"><h4>Salir</h4></i></a>
						</div>
					</div>
				<?php
					}
				?>

				<?php
					if ($_SESSION["nivel_acceso"] == 4){
				?>
					<div class="row text-center">
						<div class="col-md-4">
							<a href="proyectos.php"><i class="fas fa-tasks icono_grande" id="boton_proyectos"><h4>Proyectos Aprobados</h4></i></a>
						</div>
						<div class="col-md-4">
							<a href="pedido_cotizacion.php"><i class="fas fa-folder-plus icono_grande" id="boton_proyectos"><h4>Pedido de Cotización</h4></i></a>
						</div>
						<div class="col-md-4">
							<a href="clientes.php"><i class="fas fa-users icono_grande" id="boton_clientes"><h4>Clientes</h4></i></a>
						</div>
						
						<div class="col-md-12">
							<a href="php/logout.php"><i class="fas fa-sign-out-alt icono_grande" id="salir"><h4>Salir</h4></i></a>
						</div>
					</div>
				<?php
					}
				?>

				<?php
					if ($_SESSION["nivel_acceso"] == 5){
				?>
					<div class="row text-center">
						<div class="col-md-4">
							<a href="proyectos.php"><i class="fas fa-tasks icono_grande" id="boton_proyectos"><h4>Proyectos Aprobados</h4></i></a>
						</div>
						
						<div class="col-md-4">
							<a href="cotizaciones.php"><i class="fas fa-folder-open icono_grande" id="boton_registros"><h4>Carga de Cotizaciones</h4></i></a>
						</div>
						<div class="col-md-4">
							<a href="proveedores.php"><i class="fas fa-question-circle icono_grande"><h4>Proveedores</h4></i></a>
						</div>
						<div class="col-md-12">
							<a href="php/logout.php"><i class="fas fa-sign-out-alt icono_grande" id="salir"><h4>Salir</h4></i></a>
						</div>	
					</div>
				<?php
					}
				?>
			</section>
		</div>
	</body>
</html>