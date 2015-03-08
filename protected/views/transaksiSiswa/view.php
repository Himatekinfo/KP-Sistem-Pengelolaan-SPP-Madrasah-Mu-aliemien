<?php
$this->breadcrumbs=array(
	'Transaksi Siswa'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Daftar TransaksiSiswa', 'url'=>array('index')),
	array('label'=>'Tambah TransaksiSiswa', 'url'=>array('create')),
	array('label'=>'Edit TransaksiSiswa', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Hapus TransaksiSiswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola TransaksiSiswa', 'url'=>array('admin')),
);
?>

<h1>View TransaksiSiswa #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'user.UserName',
		'jnstransaksi.NamaJnsTransaksi',
		'No_IndukSiswa',
		'TanggalTransaksi',
		'Jumlah',
	),
)); ?>
