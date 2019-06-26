<style type="text/css">
	.author{
		position: absolute;
		right: 2%;
		font-weight: normal;
	}
</style>
<div class="container card my-4" style="width: 60%;">
	<ul class="list-group list-group-flush">
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/classes/university.php";

foreach ($results as $id => $freq) {
	$aux = new University();
	$aux->load($id);
?>	
		<li class="list-group-item">
		<div class="card-body">
			<div class="card-title">
				<span style="font-weight: bold; font-size: 1.25em;"><?php echo $aux->getName(); ?></span>
			</div>
			<p class="card-text"><?php echo $aux->getAbout(); ?></p>
			<div>
				<a class="card-link" target="_blank" href="<?php echo $aux->getLink(); ?>"><?php echo $aux->getLink(); ?></a>
				<span class="author text-muted" style="font-size: 0.75em;">Localizada em <?php echo $aux->getAddress(); ?></span>
			</div>
			
		</div>
		</li>
<?php } ?>
	</ul>
</div>

