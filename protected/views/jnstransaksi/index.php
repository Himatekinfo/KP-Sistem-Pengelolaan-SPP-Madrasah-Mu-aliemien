<?php
$this->breadcrumbs=array(
	'Jns Transaksis',
);

$this->menu=array(
	array('label'=>'Create JnsTransaksi', 'url'=>array('create')),
	array('label'=>'Manage JnsTransaksi', 'url'=>array('admin')),
);
?>

<h1>Jns Transaksis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
