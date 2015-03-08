<?php
$this->breadcrumbs=array(
	'Transaksi Pengeluarans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TransaksiPengeluaran', 'url'=>array('index')),
	array('label'=>'Manage TransaksiPengeluaran', 'url'=>array('admin')),
);
?>

<h1>Create TransaksiPengeluaran</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'dataDdlSatuan'=>$dataDdlSatuan)); ?>