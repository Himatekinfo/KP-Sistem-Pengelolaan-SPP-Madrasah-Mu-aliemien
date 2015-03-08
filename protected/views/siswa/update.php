<?php
$this->breadcrumbs=array(
	'Siswa'=>array('index'),
	$model->NIS=>array('view','id'=>$model->NIS),
	'Update',
);

$this->menu=array(
	array('label'=>'List Siswa', 'url'=>array('index')),
	array('label'=>'Create Siswa', 'url'=>array('create')),
	array('label'=>'View Siswa', 'url'=>array('view', 'id'=>$model->NIS)),
	array('label'=>'Manage Siswa', 'url'=>array('admin')),
);
?>

<h1>Update Siswa <?php echo $model->NIS; ?></h1>

<?php echo $this->renderPartial('_form', array(
        
                        'model'=>$model,
                        'modelhistorykelas'=>$modelhistorykelas,
                        'dataDdlKelas'=>$dataDdlKelas,
                        'dataDdlSekolah'=>$dataDdlSekolah,
                        'dataDdlJurusan'=>$dataDdlJurusan,
                        'dataDdltahunajaran'=>$dataDdltahunajaran,
                          )) ;?>