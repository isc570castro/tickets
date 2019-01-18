<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/images/logo/logo_circulo.png">

	<title>COCO | SHOP</title>

	<!-- Bootstrap core CSS -->
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="./assets/css/dashboard/dashboard.css" rel="stylesheet">
	<link href="./assets/css/select2.min.css" rel="stylesheet" />
	<!-- Bootstrap core JS -->

	<script src="./assets/js/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/js/fontawesome-all.js"></script>
	<script src="./assets/js/select2.min.js"></script>


</head>
<style type="text/css">
.alert-bottom{
	position: fixed;
	z-index: 3;
	bottom: 5px;
	/*left:18%;*/
	width: 100%;
}

@media (min-width: 1000px) and (max-width: 2500px) { 

	.imag2{
		padding-top: 0px;
		width: 16%;
	}
}
@media (max-width: 767px) {

	.imag2{	
		padding-top: 0px;
		width: 250px;
	}

}

</style>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2)">
		<a href="#" class="imag2"><img src="./assets/images/logo/logo_largo.png" style="max-width: 92%" ></a>
		<button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link <?php if(isset($inicio)){ ?> active <?php } ?>" href="?c=inicio">
						<i class="fas fa-home"></i>
						Inicio <span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if(isset($clientes)){ ?> active <?php } ?>" href="?c=clientes">
						<i class="fas fa-users"></i>
						Clientes
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if(isset($productos)){ ?> active <?php } ?>" href="?c=productos">
						<span data-feather="shopping-cart"></span>
						<i class="fas fa-briefcase"></i>
						Productos
					</a>
				</li>						
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-cart"></i> &nbsp;Pedidos
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="?c=pedidos&a=PedidosClientes">Clientes</a>
						<a class="dropdown-item" href="#">Proveedores</a>
					</div>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-sign-out-alt"></i> Salir</button>
			</form>
		</div>
	</nav>

	<!-- <div class="col-10"> -->
		<div class="tab-content" id="v-pills-tabContent">
			<div class="padding-nav">
				<div id="mensajejs"></div>
			</div>
			<?php include ($page); ?>
		</div>
		<!-- </div> -->
	</div>
</body>
</html>
