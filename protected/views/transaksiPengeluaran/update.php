<?php
$this->breadcrumbs=array(
	'Transaksi Pengeluarans'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TransaksiPengeluaran', 'url'=>array('index')),
	array('label'=>'Create TransaksiPengeluaran', 'url'=>array('create')),
	array('label'=>'View TransaksiPengeluaran', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage TransaksiPengeluaran', 'url'=>array('admin')),
);
?>

<h1>Update TransaksiPengeluaran <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'dataDdlSatuan'=>$dataDdlSatuan,
    )); ?>