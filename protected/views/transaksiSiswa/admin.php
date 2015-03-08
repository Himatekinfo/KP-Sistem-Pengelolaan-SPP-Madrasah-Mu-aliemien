<?php
$this->breadcrumbs=array(
	'Transaksi Siswas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar TransaksiSiswa', 'url'=>array('index')),
	array('label'=>'Tambah TransaksiSiswa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transaksi-siswa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Transaksi Siswa</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transaksi-siswa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'user.UserName',
		'jnstransaksi.NamaJnsTransaksi',
		'No_Induk.NamaSiswa',
		'TanggalTransaksi',
		'Jumlah',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
