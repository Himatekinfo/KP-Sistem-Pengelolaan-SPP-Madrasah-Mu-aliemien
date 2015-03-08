<?php
$this->breadcrumbs=array(
	'Siswa',
);

$this->menu=array(
	array('label'=>'Tambah Siswa', 'url'=>array('tambah')),
	array('label'=>'Kelola Siswa', 'url'=>array('admin')),
);
?>

<h1>Siswa</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
