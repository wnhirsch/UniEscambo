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
	<title>Carregar Material - Uni Escambo</title>

	<link rel="stylesheet" href="/pages/style.css">
</head>
<body class="bg-light">
<!-- Load navbar -->
<?php 
include $_SERVER['DOCUMENT_ROOT']."/pages/_navbar.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/search.php";
if(!isset($_SESSION)) { session_start(); }

$class = "form-control mx-auto my-1";
$status = "Preencha os campos abaixo para compartilhar seu conhecimento com outros estudantes:";
if(isset($_SESSION['error']) && $_SESSION['error'] == TRUE){
	$class .= " is-invalid";
	$status = "Algum problema aconteceu ao tentar postar um Material. Tente novamente.";
	$_SESSION['error'] = FALSE;
}

$uniList = getAll_Uni();
$programList = getAll_Program();
$courseList = getAll_Course();
?>

	<div class="container-fluid">
	<div class="row">
	<div class="col-9">

	<div class="container">
	<div class="row">
	<div class="col-lg-12">
	<div class="content my-5">
	<h5><?php echo $status; ?></h5><br>
	<form action="/actions/uploadMaterial.php" method="POST" enctype="multipart/form-data">
		<input type="text" class="<?php echo $class; ?>" name="inputTitle" placeholder="Título" required>
		<textarea class="<?php echo $class; ?>" name="inputInfo" placeholder="Escreva o que deseja compartilhar..." rows="3" required></textarea>
		<label>Atribua esse material a alguma Universidade, Curso e/ou Disciplina para o encontrarmos facilmente.</label>
		<select class="custom-select" name="inputUni">
		    <option value="null" selected>Escolha uma Universidade</option>
<?php foreach ($uniList as $id => $name) { ?>
		    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
<?php } ?>
		</select>
		<select class="custom-select my-1" name="inputProgram">
		    <option value="null" selected>Escolha um Curso</option>
<?php foreach ($programList as $id => $name) { ?>
		    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
<?php } ?>
		</select>
		<select class="custom-select my-1" name="inputCourse">
		    <option value="null" selected>Escolha uma Disciplina</option>
<?php foreach ($courseList as $id => $name) { ?>
		    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
<?php } ?>
		</select>
		<input class="form-control mx-auto my-1" type="file" name="inputFiles[]" multiple>
  		<br><button type="submit" class="btn btn-primary" required>Efetuar Upload</button>
	</form>
	</div>
	</div>
	</div>
	</div>

	</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/pages/_menu.php"; ?>
	</div>

</body>
</html>