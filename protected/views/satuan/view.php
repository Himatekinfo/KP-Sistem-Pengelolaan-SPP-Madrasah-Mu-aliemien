<?php
$this->breadcrumbs=array(
	'Satuan'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Daftar Satuan', 'url'=>array('index')),
	array('label'=>'Tambah Satuan', 'url'=>array('create')),
	array('label'=>'Ubah Satuan', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Hapus Satuan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Satuan', 'url'=>array('admin')),
);
?>

<h1>View Satuan #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Satuan',
	),
)); ?>
