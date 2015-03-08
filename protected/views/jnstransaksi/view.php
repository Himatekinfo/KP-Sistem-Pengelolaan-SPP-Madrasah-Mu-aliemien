<?php
$this->breadcrumbs=array(
	'Jns Transaksi'=>array('index'),
	$model->JnstransaksiId,
);

$this->menu=array(
	array('label'=>'Daftar JnsTransaksi', 'url'=>array('index')),
	array('label'=>'Tambah JnsTransaksi', 'url'=>array('create')),
	array('label'=>'Ubah JnsTransaksi', 'url'=>array('update', 'id'=>$model->JnstransaksiId)),
	array('label'=>'Hapus JnsTransaksi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->JnstransaksiId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola JnsTransaksi', 'url'=>array('admin')),
);
?>

<h1>View JnsTransaksi #<?php echo $model->JnstransaksiId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'JnstransaksiId',
		'NamaJnsTransaksi',
		'BisaCicil',
		'PeriodeBayarId',
		'JumlahPembayaran',
	),
)); ?>
