<?php
$this->breadcrumbs=array(
	'History Kelases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HistoryKelas', 'url'=>array('index')),
	array('label'=>'Manage HistoryKelas', 'url'=>array('admin')),
);
?>

<h1>Create HistoryKelas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
    'dataDdlKelas'=>$dataDdlKelas,
    'dataDdlSekolah'=>$dataDdlSekolah,
    'dataDdlJurusan'=>$dataDdlJurusan,
    'dataDdltahunajaran'=>$dataDdltahunajaran)); ?>