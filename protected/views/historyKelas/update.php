<?php
$this->breadcrumbs=array(
	'History Kelases'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HistoryKelas', 'url'=>array('index')),
	array('label'=>'Create HistoryKelas', 'url'=>array('create')),
	array('label'=>'View HistoryKelas', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage HistoryKelas', 'url'=>array('admin')),
);
?>

<h1>Update HistoryKelas <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'dataDdlKelas'=>$dataDdlKelas,
    'dataDdlSekolah'=>$dataDdlSekolah,
    'dataDdlsiswa'=>$dataDdlSiswa,
    'dataDdlJurusan'=>$dataDdlJurusan,
    'dataDdltahunajaran'=>$dataDdltahunajaran,
    )); ?>