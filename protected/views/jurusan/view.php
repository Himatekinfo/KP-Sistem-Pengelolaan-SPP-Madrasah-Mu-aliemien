<?php
$this->breadcrumbs=array(
	'Jurusan'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Daftar Jurusan', 'url'=>array('index')),
	array('label'=>'Hapus Jurusan', 'url'=>array('create')),
	array('label'=>'Ubah Jurusan', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Hapus Jurusan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Jurusan', 'url'=>array('admin')),
);
?>

<h1>View Jurusan #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Jurusan',
	),
)); ?>
