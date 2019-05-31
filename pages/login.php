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
	<link rel="stylesheet" href="style.css">
	<title>Login - Uni Escambo</title>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT']."/pages/navbar.php"; ?>

	<div class="container">
	<div class="row">
	<div class="col-lg-12">
	<div class="content">
	<form action="/actions/loginStudent.php" method="POST">
	<?php if($_SESSION['error'] == FALSE){ ?>
		<input type="text" class="form-control mx-auto my-1" name="inputNickmail" placeholder="Email / Apelido" required>
    	<input type="password" class="form-control mx-auto my-1" name="inputPassword" placeholder="Senha" required>
    <?php } else { ?>
		<input type="text" class="form-control mx-auto my-1 is-invalid" name="inputNickmail" placeholder="Email / Apelido" required>
    	<input type="password" class="form-control mx-auto my-1 is-invalid" name="inputPassword" placeholder="Senha" required>
  	<?php $_SESSION['error'] = FALSE; } ?>
		<button id="invalidLogin" type="submit" class="btn btn-primary">Entrar</button>
	</form>
 	</div>
	</div>
	</div>
	</div>
</body>
</html>