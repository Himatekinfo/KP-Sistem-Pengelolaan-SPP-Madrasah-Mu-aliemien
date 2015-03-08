<?php
$this->breadcrumbs=array(
	'Jns Transaksis'=>array('index'),
	'Manage',
);

?>

<div>
	<div>
		<?php echo CHtml::form(); ?>
		<?php echo CHtml::dropDownList("Kelas", "0", CHtml::listData(Kelas::model()->findAll(), 'Id','Kelas')); ?>
		<?php echo CHtml::submitButton("Filter"); ?>
        <?php echo CHtml::submitButton("Cetak"); ?>
		<?php echo CHtml::endForm(); ?>
	</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'report-transaksi-grid',
	'dataProvider'=>$model,
//	'filter'=>$model,
	'columns'=>array(
		'No_Induk',
		'siswa.NIS',
		'siswa.NamaSiswa',
		'kelas.Kelas',
		'jurusan.Jurusan',
		'TahunAjaran',
	),

	//no induk, nis, nama, kelas, jurusan, tahun ajaran
)); ?>