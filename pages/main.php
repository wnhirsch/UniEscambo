<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }
	if(!(isset($_SESSION["student"]) && $_SESSION["student"]->isOnline())){
		header("Location: /pages/home.php");
	}
?>

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

	<link rel="stylesheet" href="style.css">
	<style type="text/css">
		.content {
			text-align: center;
		}
		input {
			box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.25);
		}
		.card-title {
			font-weight: bold;
		}

	</style>

</head>
<body class="bg-light">
	<!-- Load navbar -->
	<?php include $_SERVER['DOCUMENT_ROOT']."/pages/navbar.php"; ?>
<div class="container-fluid">
<div class="row">
<div class="col-9">

<?php
include_once $_SERVER['DOCUMENT_ROOT']."/classes/material.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/search.php";

if(isset($_GET['search']) and $_GET['search'] != ""){
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
	$status .= " para \"" . $_GET['search'] . "\"";
?>	
	<div class="container my-4">
		<h4><?php echo $status; ?>.</h4>
	</div>
	<div class="container card my-4" style="width: 60%;">
		<ul class="list-group list-group-flush">
<?php
		foreach ($results as $id => $freq) {
			$aux = new Material();
			$aux->load($id);
?>	
			<li class="list-group-item">
			<div class="card-body">
				<h5 class="card-title"><?php echo $aux->getTitle(); ?></h5>
				<p class="card-text"><?php echo $aux->getInfo(); ?></p>
				<a href="#" class="card-link">Visualizar material</a>
			</div>
			</li>
<?php
		}
?>	
		</ul>
	</div>
<?php
}
else{

}
?>

</div>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/pages/menu.php"; ?>
</div>


</body>
</html>