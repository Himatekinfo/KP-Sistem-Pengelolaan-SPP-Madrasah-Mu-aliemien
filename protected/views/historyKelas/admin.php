<?php
$this->breadcrumbs=array(
	'History Kelases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HistoryKelas', 'url'=>array('index')),
	array('label'=>'Create HistoryKelas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('history-kelas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage History Kelas</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'Id'=>'history-kelas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'siswa.NamaSiswa',
		'kelas.Kelas',
		'sekolah.Sekolah',
		'jurusan.Jurusan',
		'TahunAjaran',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>