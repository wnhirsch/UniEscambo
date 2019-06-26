<style type="text/css">
	.badge-info, .author{
		position: absolute;
		right: 2%;
		font-weight: normal;
	}
</style>
<div class="container card my-4" style="width: 60%;">
	<ul class="list-group list-group-flush">
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/classes/university.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/program.php";
include_once $_SERVER['DOCUMENT_ROOT']."/classes/course.php";

foreach ($results as $id => $freq) {
	$aux = new Material();
	$aux->load($id);
	$info = $aux->getInfo();
	$info = (strlen($info) > 200) ? substr($info, 0, 200) . "..." : $info;

	$uniID = $aux->getUniversity();
	if($uniID != null){
		$uni = new University();
		$uni->load($uniID);
	}
	$progID = $aux->getProgram();
	if($progID != null){
		$prog = new Program();
		$prog->load($progID);
	}
	$courseID = $aux->getCourse();
	if($courseID != null){
		$course = new Course();
		$course->load($courseID);
	}
?>	
		<li class="list-group-item">
		<div class="card-body">
			<div class="card-title">
				<span style="font-weight: bold; font-size: 1.25em;"><?php echo $aux->getTitle(); ?></span>
				<span class="badge badge-pill badge-info"><?php echo $aux->getDate(); ?></span>
			</div>
			<p class="card-text"><?php echo $info; ?></p>
			<div>
<?php if(isset($uni)) { ?>
				<span class="badge badge-pill badge-secondary"><?php echo $uni->getName(); ?></span>
<?php } if(isset($prog)) { ?>
				<span class="badge badge-pill badge-secondary"><?php echo $prog->getName(); ?></span>
<?php } if(isset($course)) { ?>
				<span class="badge badge-pill badge-secondary"><?php echo $course->getName(); ?></span>
<?php } ?>
			</div><br>
			<div>
				<a href="/index.php?page=show_material&&id=<?php echo $aux->getId(); ?>" class="card-link">Visualizar material</a>
				<span class="author text-muted" style="font-size: 0.75em;">Publicado por @<?php echo $aux->getStudent(); ?></span>
			</div>
		</div>
		</li>
<?php } ?>
	</ul>
</div>

