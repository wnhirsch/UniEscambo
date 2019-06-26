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
	<title>Perfil - Uni Escambo</title>

	<link rel="stylesheet" href="/pages/style.css">
	<style type="text/css">
		.data {
			margin-left: 2em;
		}
	</style>

</head>
<body class="bg-light">
<!-- Load navbar -->
<?php 
include $_SERVER['DOCUMENT_ROOT']."/pages/_navbar.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/university.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/program.php";
if(!isset($_SESSION)) { session_start(); }

$uniID = $_SESSION['student']->getUniversity();
if($uniID != null){
	$uni = new University();
	$uni->load($uniID);
}
$progID = $_SESSION['student']->getProgram();
if($progID != null){
	$prog = new Program();
	$prog->load($progID);
}
?>
	<div class="container-fluid">
	<div class="row">
	<div class="col-9">
 	
 	<div class="container my-4">
	<div class="card">
	<ul class="list-group list-group-flush">
	<li class="list-group-item">
	<div class="card-body">
		<h4 class="card-title">Perfil</h4><br>
<!-- Nome -->
		<p><span class="text-secondary">Nome: </span>
			<span class="data"><?php echo $_SESSION['student']->getName(); ?></span></p>
<!-- Apelido -->
		<p><span class="text-secondary">Apelido: </span>
			<span class="data">@<?php echo $_SESSION['student']->getNickname(); ?></span></p>
<!-- Email -->
		<p><span class="text-secondary">Email: </span>
			<a class="data" href="mailto:<?php echo $_SESSION['student']->getMail(); ?>"><?php echo $_SESSION['student']->getMail(); ?></a></p>
<!-- Site -->
		<p><span class="text-secondary">Site: </span>
<?php if($_SESSION['student']->getLink() == "") { ?>
		<span class="data text-muted">Nenhum link definido</span>
<?php } else { ?>
		<a class="data" href="<?php echo $_SESSION['student']->getLink(); ?>"><?php echo $_SESSION['student']->getLink(); ?></a>
<?php } ?> </p>
<!-- Sobre -->
		<p><span class="text-secondary">Sobre você: </span>
<?php if($_SESSION['student']->getAbout() == "") { ?>
		<span class="data text-muted">Nenhuma descrição definida</span>
<?php } else { ?>
		<span class="data"><?php echo $_SESSION['student']->getAbout(); ?></span>
<?php } ?> </p>
<!-- Universidade -->
		<p><span class="text-secondary">Universidade: </span>
<?php if(isset($uni)) { ?>
		<span class="data"><?php echo $uni->getName(); ?></span>
<?php } else { ?>
		<span class="data text-muted">Nenhuma Universidade definida</span>
<?php } ?> </p>
<!-- Curso -->
		<p><span class="text-secondary">Curso: </span>
<?php if(isset($prog)) { ?>
		<span class="data"><?php echo $prog->getName(); ?></span>
<?php } else { ?>
		<span class="data text-muted">Nenhum Curso definido</span>
<?php } ?> </p>
	</div>
	</li>
	</ul>
	</div>
	</div>

	</div>
<?php 
$activeBtn = 0;
include_once $_SERVER['DOCUMENT_ROOT']."/pages/_menu.php"; 
?>
	</div>

</body>
</html>