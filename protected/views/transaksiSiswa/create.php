<?php
$this->breadcrumbs=array(
	'Transaksi Siswas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TransaksiSiswa', 'url'=>array('index')),
	array('label'=>'Manage TransaksiSiswa', 'url'=>array('admin')),
);
?>

<h1>Create TransaksiSiswa</h1>

<?php echo $this->renderPartial('_form', array(
			'model'=>$model,
                        'dataDdljnstransaksi'=>$dataDdljnstransaksi,
                        'dataDdlsiswa'=>$dataDdlsiswa,
		)); ?>