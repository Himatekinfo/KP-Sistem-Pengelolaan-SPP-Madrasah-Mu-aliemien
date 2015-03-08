<?php
$this->breadcrumbs=array(
	'Periode Bayars',
);

$this->menu=array(
	array('label'=>'Create PeriodeBayar', 'url'=>array('create')),
	array('label'=>'Manage PeriodeBayar', 'url'=>array('admin')),
);
?>

<h1>Periode Bayars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
