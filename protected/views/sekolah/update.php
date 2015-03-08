<?php
$this->breadcrumbs=array(
	'Sekolahs'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sekolah', 'url'=>array('index')),
	array('label'=>'Create Sekolah', 'url'=>array('create')),
	array('label'=>'View Sekolah', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Sekolah', 'url'=>array('admin')),
);
?>

<h1>Update Sekolah <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>