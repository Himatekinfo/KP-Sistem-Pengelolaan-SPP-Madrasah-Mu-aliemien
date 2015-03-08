<?php
$this->breadcrumbs=array(
	'Satuans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Satuan', 'url'=>array('index')),
	array('label'=>'Manage Satuan', 'url'=>array('admin')),
);
?>

<h1>Create Satuan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>