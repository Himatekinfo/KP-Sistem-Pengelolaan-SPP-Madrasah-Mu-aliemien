<?php
$this->breadcrumbs=array(
	'Transaksi Pengeluarans',
);

$this->menu=array(
	array('label'=>'Tambah TransaksiPengeluaran', 'url'=>array('create')),
	array('label'=>'Kelola TransaksiPengeluaran', 'url'=>array('admin')),
);
?>

<h1>Transaksi Pengeluaran</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
