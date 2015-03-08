<?php
$this->breadcrumbs=array(
	'Jns Transaksis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JnsTransaksi', 'url'=>array('index')),
	array('label'=>'Manage JnsTransaksi', 'url'=>array('admin')),
);
?>

<h1>Create JnsTransaksi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'dataDdlPeriodebayar'=>$dataDdlPeriodebayar)); ?>