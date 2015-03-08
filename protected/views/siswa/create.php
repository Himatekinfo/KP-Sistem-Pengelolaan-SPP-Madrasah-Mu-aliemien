<?php
$this->breadcrumbs=array(
	'Siswa'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Siswa', 'url'=>array('index')),
	array('label'=>'Manage Siswa', 'url'=>array('admin')),
);
?>

<h1>Create Siswa</h1>

<?php echo $this->renderPartial('_form',array(
			'model'=>$model,
                        'modelhistorykelas'=>$modelhistorykelas,
                        'dataDdlKelas'=>$dataDdlKelas,
                        'dataDdlSekolah'=>$dataDdlSekolah,
                        'dataDdlJurusan'=>$dataDdlJurusan,
                        'dataDdltahunajaran'=>$dataDdltahunajaran,
    
		)); ?>