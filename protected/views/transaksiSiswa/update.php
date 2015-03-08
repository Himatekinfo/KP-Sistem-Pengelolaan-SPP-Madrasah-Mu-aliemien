<?php
$this->breadcrumbs=array(
	'Transaksi Siswas'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TransaksiSiswa', 'url'=>array('index')),
	array('label'=>'Create TransaksiSiswa', 'url'=>array('create')),
	array('label'=>'View TransaksiSiswa', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage TransaksiSiswa', 'url'=>array('admin')),
);
?>

<h1>Update TransaksiSiswa <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'dataDdljnstransaksi'=>$dataDdljnstransaksi,
    'dataDdlsiswa'=>$dataDdlsiswa,
    )); ?>