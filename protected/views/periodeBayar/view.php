<?php
$this->breadcrumbs=array(
	'Periode Bayar'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Daftar PeriodeBayar', 'url'=>array('index')),
	array('label'=>'Tambah PeriodeBayar', 'url'=>array('create')),
	array('label'=>'Ubah PeriodeBayar', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Hapus PeriodeBayar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola PeriodeBayar', 'url'=>array('admin')),
);
?>

<h1>View PeriodeBayar #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'PeriodeBayar',
	),
)); ?>
