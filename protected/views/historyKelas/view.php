<?php
$this->breadcrumbs=array(
	'History Kelas'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List HistoryKelas', 'url'=>array('index')),
	array('label'=>'Tambah HistoryKelas', 'url'=>array('create')),
	array('label'=>'Ubah HistoryKelas', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Hapus HistoryKelas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola HistoryKelas', 'url'=>array('admin')),
);
?>

<h1>View HistoryKelas #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'No_Induk',
		'KelasId',
		'SekolahId',
		'JurusanId',
		'TahunAjaran',
	),
)); ?>
