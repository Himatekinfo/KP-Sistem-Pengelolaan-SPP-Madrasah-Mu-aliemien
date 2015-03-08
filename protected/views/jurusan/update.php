<?php
$this->breadcrumbs=array(
	'Jurusans'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jurusan', 'url'=>array('index')),
	array('label'=>'Create Jurusan', 'url'=>array('create')),
	array('label'=>'View Jurusan', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Jurusan', 'url'=>array('admin')),
);
?>

<h1>Update Jurusan <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>