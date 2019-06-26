<style type="text/css">
	.col-3 {
		overflow: hidden;
		display: block;
		box-shadow: -2px -2px 5px rgba(0, 0, 0, 0.5);
	}
	.nav-item, .col-3 {
		margin: 0px;
		padding: 0px;
	}

	.col-9 {
		height: 90vh;
		overflow-y: auto;
		overflow-x: hidden;
		display: block;
	}
	sup {
		font-size: 70%;
	}
</style>
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
if(!isset($_SESSION)) { session_start(); }
$active = array();
for($btn = 0; $btn < 3; $btn++) {
	$active[$btn] = (isset($activeBtn) && $btn == $activeBtn) ? "active" : "";
}
?>
<ul class="nav nav nav-pills flex-column col-3 bg-light">
	<li class="nav-item btn btn-light btn-lg btn-block">
		<a class="nav-link <?php echo $active[0]; ?>" href="/index.php?page=profile">Perfil <?php
if($_SESSION["student"]->lessInfo()){ ?>
		<sup><span class="badge badge-pill badge-warning">!</span></sup>
<?php } ?>
	</a></li>
	<li class="nav-item btn btn-light btn-lg btn-block" style="margin-top: 0px;">
		<a class="nav-link <?php echo $active[1]; ?>" href="/index.php?page=user_material">Meus Materiais</a></li>
	<li class="nav-item btn btn-light btn-lg btn-block" style="margin-top: 0px;">
		<a class="nav-link <?php echo $active[2]; ?>" href="/index.php?page=user_course">Minhas Disciplinas</a></li>
</ul>