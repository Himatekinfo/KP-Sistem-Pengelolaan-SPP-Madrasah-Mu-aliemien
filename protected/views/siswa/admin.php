<?php
$this->breadcrumbs = array(
    'Siswas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Siswa', 'url' => array('index')),
    array('label' => 'Create Siswa', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('siswa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Siswa</h1>



<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'siswa-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'No_Induk',
        'NIS',
        'NamaSiswa',
        'RBL',
        'JK',
        'TempatLahir',
        'TanggalLahir',
        'Ayah',
        'Ibu',
        'Pekerjaan_ortu',
        'Ekonomi',
        'Alamat',
        'No_STTB',
        'Asal_Sekolah',
        
        
        /*
        
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
