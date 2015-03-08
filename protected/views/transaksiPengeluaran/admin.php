<?php
$this->breadcrumbs=array(
	'Transaksi Pengeluarans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar TransaksiPengeluaran', 'url'=>array('index')),
	array('label'=>'Tambah TransaksiPengeluaran', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transaksi-pengeluaran-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Transaksi Pengeluarans</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transaksi-pengeluaran-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'user.UserName',
		'Deskripsi',
                array(
                    'name'=>'Tanggal',
                    'value'=>  'substr("$data->Tanggal", 0, 10)'
                ),
		'Ket',
		'JumlahBenda',
		/*
		'HargaSatuan',
		'SatuanId',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
