<?php
$this->breadcrumbs=array(
	'Sekolah'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Daftar Sekolah', 'url'=>array('index')),
	array('label'=>'Tambah Sekolah', 'url'=>array('create')),
	array('label'=>'Ubah Sekolah', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Hapus Sekolah', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Sekolah', 'url'=>array('admin')),
);
?>

<h1>View Sekolah #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Sekolah',
	),
)); ?>
