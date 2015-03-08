<?php
$this->breadcrumbs=array(
	'Satuans'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Satuan', 'url'=>array('index')),
	array('label'=>'Create Satuan', 'url'=>array('create')),
	array('label'=>'View Satuan', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Satuan', 'url'=>array('admin')),
);
?>

<h1>Update Satuan <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>