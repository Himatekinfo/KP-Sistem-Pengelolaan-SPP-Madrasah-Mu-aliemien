<?php
$this->breadcrumbs=array(
	'Jurusans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jurusan', 'url'=>array('index')),
	array('label'=>'Manage Jurusan', 'url'=>array('admin')),
);
?>

<h1>Create Jurusan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>