<div class="container card my-4" style="width: 60%;">
	<ul class="list-group list-group-flush">
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/classes/program.php";

foreach ($results as $id => $freq) {
	$aux = new Program();
	$aux->load($id);
?>	
		<li class="list-group-item">
		<div class="card-body">
			<div class="card-title">
				<span style="font-weight: bold; font-size: 1.25em;"><?php echo $aux->getName(); ?></span>
			</div>
			<p class="card-text"><?php echo $aux->getAbout(); ?></p>
		</div>
		</li>
<?php } ?>
	</ul>
</div>

