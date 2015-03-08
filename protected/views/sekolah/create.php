<?php
$this->breadcrumbs=array(
	'Sekolahs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sekolah', 'url'=>array('index')),
	array('label'=>'Manage Sekolah', 'url'=>array('admin')),
);
?>

<h1>Create Sekolah</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>