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
		.edit {
			position: absolute;
			right: 2%;
		}
		sup {
			font-size: 70%;
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
<?php if(!isset($_GET['edit'])) { ?>
		<div><span style="font-size: 1.5em;">Perfil</span>
			<a class="btn btn-success edit" href="/index.php?page=profile&&edit=true">Editar</a></div><br>
<!-- Nome -->
		<p class="row"><span class="text-secondary col-sm-2">Nome: </span>
			<span class="col-sm-10"><?php echo $_SESSION['student']->getName(); ?></span></p>
<!-- Apelido -->
		<p class="row"><span class="text-secondary col-sm-2">Apelido: </span>
			<span class="col-sm-10">@<?php echo $_SESSION['student']->getNickname(); ?></span></p>
<!-- Email -->
		<p class="row"><span class="text-secondary col-sm-2">Email: </span>
			<a class="col-sm-10" href="mailto:<?php echo $_SESSION['student']->getMail(); ?>"><?php echo $_SESSION['student']->getMail(); ?></a></p>
<!-- Site -->
		<p class="row"><span class="text-secondary col-sm-2">Site: </span>
<?php if($_SESSION['student']->getLink() == "") { ?>
		<span class="col-sm-10 text-muted">Nenhum link definido <sup><span class="badge badge-pill badge-warning">!</span></sup></span>
<?php } else { ?>
		<a class="col-sm-10" href="<?php echo $_SESSION['student']->getLink(); ?>"><?php echo $_SESSION['student']->getLink(); ?></a>
<?php } ?> </p>
<!-- Sobre -->
		<p class="row"><span class="text-secondary col-sm-2">Sobre você: </span>
<?php if($_SESSION['student']->getAbout() == "") { ?>
		<span class="col-sm-10 text-muted">Nenhuma descrição definida <sup><span class="badge badge-pill badge-warning">!</span></sup></span>
<?php } else { ?>
		<span class="col-sm-10 font-italic"><?php echo $_SESSION['student']->getAbout(); ?></span>
<?php } ?> </p>
<!-- Universidade -->
		<p class="row"><span class="text-secondary col-sm-2">Universidade: </span>
<?php if(isset($uni)) { ?>
		<span class="col-sm-10"><?php echo $uni->getName(); ?></span>
<?php } else { ?>
		<span class="col-sm-10 text-muted">Nenhuma Universidade definida <sup><span class="badge badge-pill badge-warning">!</span></sup></span>
<?php } ?> </p>
<!-- Curso -->
		<p class="row"><span class="text-secondary col-sm-2">Curso: </span>
<?php if(isset($prog)) { ?>
		<span class="col-sm-10"><?php echo $prog->getName(); ?></span>
<?php } else { ?>
		<span class="col-sm-10 text-muted">Nenhum Curso definido <sup><span class="badge badge-pill badge-warning">!</span></sup></span>
<?php } ?> </p>

<?php
} else { 
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/search.php";
	$uniList = getAll_Uni();
	$progList = getAll_Program();

	$class = "form-control";
	if(isset($_SESSION['error']) && $_SESSION['error'] == TRUE){
		$class .= " is-invalid";
		$_SESSION['error'] = FALSE;
	}
?>
		<h4>Perfil</h4>
		<h6 class="text-secondary">Edite as caixas abaixo para alterar as suas informações:</h6><br>
		<form action="/actions/editStudent.php" method="POST">
<!-- Nome -->
			<div class="form-group row">
		    	<label for="inputName" class="col-sm-2 col-form-label">Nome: </label>
		    	<div class="col-sm-10">
		      		<input class="form-control" type="text" id="inputName" name="inputName" value="<?php echo $_SESSION['student']->getName(); ?>" required>
		    	</div>
			</div>
<!-- Apelido -->
			<div class="form-group row">
		    	<label for="inputNickname" class="col-sm-2 col-form-label">Apelido: </label>
		    	<div class="col-sm-10">
		      		<input class="form-control-plaintext" readonly type="text" id="inputNickname" value="@<?php echo $_SESSION['student']->getNickname(); ?>">
		    	</div>
			</div>
<!-- Senha -->
			<div class="form-group row">
		    	<label for="inputPassword" class="col-sm-2 col-form-label">Nova Senha: </label>
		    	<div class="col-sm-10">
		      		<input class="form-control" type="password" id="inputPassword" name="inputPassword">
		    	</div>
			</div>
<!-- Email -->
			<div class="form-group row">
		    	<label for="inputMail" class="col-sm-2 col-form-label">Email: </label>
		    	<div class="col-sm-10">
		      		<input class="form-control" type="email" id="inputMail" name="inputMail" value="<?php echo $_SESSION['student']->getMail(); ?>" required>
		    	</div>
			</div>
<!-- Site -->
			<div class="form-group row">
		    	<label for="inputLink" class="col-sm-2 col-form-label">Site: </label>
		    	<div class="col-sm-10">
		      		<input class="form-control" type="url" id="inputLink" name="inputLink" value="<?php echo $_SESSION['student']->getLink(); ?>">
		    	</div>
			</div>
<!-- Sobre -->
			<div class="form-group row">
		    	<label for="inputAbout" class="col-sm-2 col-form-label">Sobre você: </label>
		    	<div class="col-sm-10">
		      		<textarea class="form-control" type="text" id="inputAbout" name="inputAbout" rows="3"><?php echo $_SESSION['student']->getAbout(); ?></textarea>
		    	</div>
			</div>
<!-- Universidade -->
			<div class="form-group row">
		    	<label for="inputUni" class="col-sm-2 col-form-label">Universidade: </label>
		    	<div class="col-sm-10">
					<select class="custom-select" name="inputUni" id="inputUni">
					    <option value="null" selected>Escolha uma Universidade</option>
<?php
	foreach ($uniList as $id => $name) {
		$isSelected = ($_SESSION['student']->getUniversity() == $id) ? "selected" : "";
?>
					    <option value="<?php echo $id; ?>" <?php echo $isSelected; ?> ><?php echo $name; ?></option>
<?php } ?>
					</select>
		    	</div>
			</div>
<!-- Curso -->
			<div class="form-group row">
		    	<label for="inputProg" class="col-sm-2 col-form-label">Curso: </label>
		    	<div class="col-sm-10">
					<select class="custom-select" name="inputProg" id="inputProg">
					    <option value="null" selected>Escolha um Curso</option>
<?php
	foreach ($progList as $id => $name) {
		$isSelected = ($_SESSION['student']->getProgram() == $id) ? "selected" : "";
?>
					    <option value="<?php echo $id; ?>" <?php echo $isSelected; ?> ><?php echo $name; ?></option>
<?php } ?>
					</select>
		    	</div>
			</div>
<!-- Submit -->
			<br><br><div class="form-group row">
		    	<label for="confirm" class="col-sm-2 col-form-label">Senha Atual: </label>
		    	<div class="col-sm-10 form-inline">
		      		<input class="<?php echo $class; ?>" type="password" id="confirm" name="actualPassword" required="">
		      		<button type="submit" class="btn btn-primary ml-3" id="confirm">Efetuar Alterações</button>
		    	</div>
			</div>
		</form>
<?php } ?>
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