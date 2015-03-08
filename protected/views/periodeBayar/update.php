<?php
$this->breadcrumbs=array(
	'Periode Bayars'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'List PeriodeBayar', 'url'=>array('index')),
	array('label'=>'Create PeriodeBayar', 'url'=>array('create')),
	array('label'=>'View PeriodeBayar', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage PeriodeBayar', 'url'=>array('admin')),
);
?>

<h1>Ubah PeriodeBayar <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>