<?php
$this->breadcrumbs=array(
	'Satuans',
);

$this->menu=array(
	array('label'=>'Create Satuan', 'url'=>array('create')),
	array('label'=>'Manage Satuan', 'url'=>array('admin')),
);
?>

<h1>Satuans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
