<nav class="navbar navbar-dark bg-dark">
<div class="container">
	<a class="navbar-brand text-light" href="/pages/home.php">Uni Escambo</a>
<?php
	include $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	session_start();

	if($_SESSION["student"]->isOnline == TRUE){
		$name = $_SESSION["student"]->getName();
		$pos = stripos($name, " ");
		if($pos != FALSE)
			$name = substr($name, 0, $pos - strlen($name));
?>
	<div class="form-inline navbar-right">
		<span class="navbar-text mr-2">
<?php echo "Olá, " . ucfirst($name) . "."; ?>
		</span>
		<a class="btn btn-danger" href="/index.php" role="button">Sair</a>
	</div>
<?php } else { ?>
	<div class="form-inline navbar-right">
		<a class="btn btn-outline-success mr-1" href="/pages/login.php" role="button">Login</a>
		<a class="btn btn-success" href="/pages/signUp.php" role="button">Cadastre-se</a>
	</div>
<?php } ?>
</div>
</nav>