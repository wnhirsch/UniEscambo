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
		.content {
			text-align: center;
		}
		input {
			box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
		}
		.upload, .badge-info, .author {
			position: absolute;
			right: 2%;
		}
	</style>

</head>
<body class="bg-light">
	<!-- Load navbar -->
	<?php include $_SERVER['DOCUMENT_ROOT']."/pages/_navbar.php"; ?>
<div class="container-fluid">
<div class="row">
<div class="col-9">

<?php
include_once $_SERVER['DOCUMENT_ROOT']."/classes/material.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/search.php";

$status = "";
$results = array();
if(isset($_GET['search']) and $_GET['search'] != "" and isset($_GET['option'])){
	$results = search($_GET['search'], $_GET['option']);
	switch (count($results)) {
		case 0:
			$status = "Nenhum resultado encontrado";
			break;
		case 1:
			$status = "Foi encontrado 1 resultado";
			break;
		default:
			$status = "Foram encontrados " . count($results) . " resultados";
			break;
	}
	$status .= " para \"" . $_GET['search'] . "\".";
}
else{ $status = "Busque o que quiser na caixa de texto acima :)"; }
?>	
	<div class="container my-4">
		<span style="font-size: 1.5em;"><?php echo $status; ?></span>
		<a class="btn btn-success upload" href="/index.php?page=upload">Upload</a>
	</div>
<?php
if(isset($_GET['search']) and $_GET['search'] != "" and isset($_GET['option'])){
	switch ($_GET['option']) {
		case 1:
			include $_SERVER['DOCUMENT_ROOT']."/pages/_miniMat.php";
			break;
		case 2:
			include $_SERVER['DOCUMENT_ROOT']."/pages/_miniCourse.php";
			break;
		case 3:
			include $_SERVER['DOCUMENT_ROOT']."/pages/_miniProg.php";
			break;
		case 4:
			include $_SERVER['DOCUMENT_ROOT']."/pages/_miniUni.php";
			break;
	}
}
?>
</div>
<?php include $_SERVER['DOCUMENT_ROOT']."/pages/_menu.php"; ?>
</div>


</body>
</html>