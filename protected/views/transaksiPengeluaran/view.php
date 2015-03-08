<?php
$this->breadcrumbs=array(
	'Transaksi Pengeluarans'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Daftar TransaksiPengeluaran', 'url'=>array('index')),
	array('label'=>'Tambah TransaksiPengeluaran', 'url'=>array('create')),
	array('label'=>'Ubah TransaksiPengeluaran', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Hapus TransaksiPengeluaran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola TransaksiPengeluaran', 'url'=>array('admin')),
);
?>

<h1>View TransaksiPengeluaran #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'user.UserName',
		'Deskripsi',
		'Tanggal',
		'Ket',
		'JumlahBenda',
		'HargaSatuan',
		'SatuanId',
	),
)); ?>
