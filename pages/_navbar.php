<style type="text/css">
	.navbar {
		box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
		background-color: rgba(40,40,40,0.975);
	}
	input {
		width: 5vh;
	}
</style>

<nav class="navbar sticky-top navbar-dark">
<div class="container">
<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }
	
	$isOnline = isset($_SESSION["student"]) && $_SESSION["student"]->isOnline();
	$linkTo = ($isOnline) ? "/index.php?page=main" : "/index.php?page=home";
?>
	<a class="navbar-brand text-light" href="<?php echo $linkTo; ?>">Uni Escambo</a>
<!-- If there is one user online... -->
<?php
	if($isOnline){
		$name = $_SESSION["student"]->getName();
		$pos = stripos($name, " ");
		if($pos != FALSE)
			$name = substr($name, 0, $pos - strlen($name));
		// Try to catch the last search text and option.
		if(isset($_GET['search']) && isset($_GET['option'])){
			$value = "value=\"" . $_GET['search'] . "\"";
			$value1 = ($_GET['option'] == 1) ? "selected" : "";
			$value2 = ($_GET['option'] == 2) ? "selected" : "";
			$value3 = ($_GET['option'] == 3) ? "selected" : "";
			$value4 = ($_GET['option'] == 4) ? "selected" : "";
		}
		else { $value = ""; $value1 = "selected"; $value2 = ""; $value3 = ""; $value4 = ""; }

?>
    <form class="form-inline" action="/index.php?page=main">
      	<input class="form-control mr-sm-1" type="search" name="search" placeholder="Busque o que quiser..." <?php echo $value; ?> >
        <select class="custom-select mr-sm-1" id="searchIn" name="option">
		    <option value="1" <?php echo $value1; ?> >Materiais</option>
		    <option value="2" <?php echo $value2; ?> >Disciplinas</option>
		    <option value="3" <?php echo $value3; ?>>Cursos</option>
		    <option value="4" <?php echo $value4; ?>>Universidades</option>
		</select>
      	<button class="btn btn-info" type="submit">Pesquisar</button>
    </form>

	<div class="form-inline navbar-right">
		<span class="navbar-text mr-4">
<!-- print your name -->
<?php echo "Olá, " . ucfirst($name) . "."; ?>
		</span>
		<a class="btn btn-danger" href="/index.php?page=exit" role="button">Sair</a>
	</div>
<!-- If not,  -->
<?php } else { ?>
	<div class="form-inline navbar-right">
		<a class="btn btn-outline-success mr-1" href="/index.php?page=login" role="button">Login</a>
		<a class="btn btn-success" href="/index.php?page=signUp" role="button">Cadastre-se</a>
	</div>
<?php } ?>

</div>
</nav>