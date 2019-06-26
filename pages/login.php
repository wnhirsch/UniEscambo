<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<title>Login - Uni Escambo</title>

	<link rel="stylesheet" href="/pages/style.css">
	<style type="text/css">
		.content {
			padding-top: 10%;
			text-align: center;
			text-shadow: 3px 3px 10px rgba(0, 0, 0, 1);
		}
		.form-control {
			width: 25%;
		}
		input, button {
			box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
		}
		#info{
			font-weight: bold;
		}
	</style>
	
</head>
<body>
	<!-- Load navbar and Background-->
	<?php 
		include $_SERVER['DOCUMENT_ROOT']."/pages/_navbar.php"; 
		include $_SERVER['DOCUMENT_ROOT']."/pages/_back.php"; 
		if(!isset($_SESSION)) { session_start(); }

		$class = "form-control mx-auto my-1";
		if(isset($_SESSION['error']) && $_SESSION['error'] == TRUE){
			$class .= " is-invalid";
			$_SESSION['error'] = FALSE;
		}
	?>

	<div class="container">
	<div class="row">
	<div class="col-lg-12">
	<div class="content">
	<h5 class="text-light">Insira seu Apelido / E-mail e Senha:</h5> <br>
	<form action="/actions/loginStudent.php" method="POST">
		<input type="text" class="<?php echo $class?>" name="inputNickmail" placeholder="Email / Apelido" required>
    	<input type="password" class="<?php echo $class?>" name="inputPassword" placeholder="Senha" required>
    	<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" name="remember" id="remember">
			<label class="custom-control-label text-light" for="remember">Mantenha-me conectado</label>
		</div>
		<br><button id="invalidLogin" type="submit" class="btn btn-primary">Entrar</button>
	</form>
	<br><h6 class="text-light">Caso você não faça parte da nossa plataforma, <br> clique no botão de <span id="info">"Cadastre-se"</span> no topo da página.</h6>
 	</div>
	</div>
	</div>
	</div>
</body>
</html>