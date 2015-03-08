<?php
$this->breadcrumbs=array(
	'Jns Transaksis'=>array('index'),
	$model->JnstransaksiId=>array('view','id'=>$model->JnstransaksiId),
	'Update',
);

$this->menu=array(
	array('label'=>'List JnsTransaksi', 'url'=>array('index')),
	array('label'=>'Create JnsTransaksi', 'url'=>array('create')),
	array('label'=>'View JnsTransaksi', 'url'=>array('view', 'id'=>$model->JnstransaksiId)),
	array('label'=>'Manage JnsTransaksi', 'url'=>array('admin')),
);
?>

<h1>Update JnsTransaksi <?php echo $model->JnstransaksiId; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'dataDdlPeriodebayar'=>$dataDdlPeriodebayar,
    )); ?>