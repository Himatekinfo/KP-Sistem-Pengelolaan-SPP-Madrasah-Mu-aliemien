<?php
$this->breadcrumbs=array(
	'History Kelases',
);

$this->menu=array(
	array('label'=>'Create HistoryKelas', 'url'=>array('create')),
	array('label'=>'Manage HistoryKelas', 'url'=>array('admin')),
);
?>

<h1>History Kelases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
