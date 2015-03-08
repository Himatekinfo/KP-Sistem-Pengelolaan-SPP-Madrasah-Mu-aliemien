<?php
$this->breadcrumbs=array(
	'Transaksi Siswas',
);

$this->menu=array(
	array('label'=>'Tambah TransaksiSiswa', 'url'=>array('create')),
	array('label'=>'Kelola TransaksiSiswa', 'url'=>array('admin')),
);
?>

<h1>Transaksi Siswas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
