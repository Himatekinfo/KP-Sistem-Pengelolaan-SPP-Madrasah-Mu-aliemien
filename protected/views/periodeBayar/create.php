<?php
$this->breadcrumbs=array(
	'Periode Bayars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PeriodeBayar', 'url'=>array('index')),
	array('label'=>'Manage PeriodeBayar', 'url'=>array('admin')),
);
?>

<h1>Create PeriodeBayar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>