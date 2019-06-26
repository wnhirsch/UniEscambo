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
	<title>Página Inicial - Uni Escambo</title>

	<link rel="stylesheet" href="/pages/style.css">
	<style type="text/css">
		.badge-info, .author {
			position: absolute;
			right: 2%;
			font-weight: normal;
		}
	</style>

</head>
<body class="bg-light">
<!-- Load navbar -->
<?php
include $_SERVER['DOCUMENT_ROOT']."/pages/_navbar.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/search.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/material.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/university.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/program.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/course.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/file.php";
if(!isset($_SESSION)) { session_start(); }

$material = new Material();
if(!isset($_GET["id"]) || !$material->load($_GET["id"])){
	header("Location: /index.php?page=main");
}

$uniID = $material->getUniversity();
if($uniID != null){
	$uni = new University();
	$uni->load($uniID);
}
$progID = $material->getProgram();
if($progID != null){
	$prog = new Program();
	$prog->load($progID);
}
$courseID = $material->getCourse();
if($courseID != null){
	$course = new Course();
	$course->load($courseID);
}

$fileList = getMaterialFiles($material->getId());
?>
	<div class="container-fluid">
	<div class="row">
	<div class="col-9">
	<div class="container my-4">
<?php if(isset($_GET["now"])){ ?>
		<h5>Material postado com sucesso!</h5><br>
<?php } ?>
		<div class="card">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
			<div class="card-body">
				<div class="card-title">
					<span style="font-weight: bold; font-size: 1.25em;"><?php echo $material->getTitle(); ?></span>
					<span style="" class="badge badge-pill badge-info"><?php echo $material->getDate(); ?></span>
				</div>
				<p class="card-text"><?php echo $material->getInfo(); ?></p>
<?php if(isset($uni)) { ?>
				<span class="badge badge-pill badge-secondary"><?php echo $uni->getName(); ?></span>
<?php } if(isset($prog)) { ?>
				<span class="badge badge-pill badge-secondary"><?php echo $prog->getName(); ?></span>
<?php } if(isset($course)) { ?>
				<span class="badge badge-pill badge-secondary"><?php echo $course->getName(); ?></span>
<?php } ?>
				<span class="author text-muted" style="font-size: 0.75em;">Publicado por @<?php echo $material->getStudent(); ?></span>
				<ul class="list-group list-group-flush">
<?php foreach ($fileList as $id => $file) { ?>
					<li class="list-group-item">
						<img src="http://localhost/media/icoFile.svg" alt="File Icon">
						<a class="card-body" target="_blank" href="<?php echo $file->getLink(); ?>"><?php echo $file->getFilename(); ?></a>
					</li>
<?php } ?>
				</ul>
			</div>
			</li>
		</ul>
	</div>
	</div>
	</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/pages/_menu.php"; ?>
	</div>


</body>
</html>