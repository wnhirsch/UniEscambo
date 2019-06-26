<div class="container card my-4" style="width: 60%;">
	<ul class="list-group list-group-flush">
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/classes/course.php";

foreach ($results as $id => $freq) {
	$aux = new Course();
	$aux->load($id);
?>	
		<li class="list-group-item">
		<div class="card-body">
			<div class="card-title">
				<span style="font-weight: bold; font-size: 1.25em;"><?php echo $aux->getName(); ?></span>
			</div>
			<p class="card-text"><?php echo $aux->getAbout(); ?></p>
<?php if($_SESSION["student"]->isSubscribed($id)) { ?>
			<form action="/actions/unsubscribeCourse.php" method="POST">
				<button class="btn btn-danger" value="<?php echo $id; ?>" name="id">Desmatricular</button>
			</form>
<?php } else { ?>
			<form action="/actions/subscribeCourse.php" method="POST">
				<button class="btn btn-success" value="<?php echo $id; ?>" name="id">Matricular</button>
			</form>
<?php } ?>
		</div>
		</li>
<?php } ?>
	</ul>
</div>

