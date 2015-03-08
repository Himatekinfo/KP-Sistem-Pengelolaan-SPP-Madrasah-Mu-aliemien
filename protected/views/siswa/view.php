<?php
$this->breadcrumbs=array(
	'Siswa'=>array('index'),
	$model->No_Induk,
);

$this->menu=array(
	array('label'=>'Daftar Siswa', 'url'=>array('index')),
	array('label'=>'Tambah Siswa', 'url'=>array('create')),
	array('label'=>'Ubah Siswa', 'url'=>array('update', 'id'=>$model->No_Induk)),
	array('label'=>'Hapus Siswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->No_Induk),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Siswa', 'url'=>array('admin')),
);
?>

<h1>View Siswa #<?php echo $model->No_Induk; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attribut'=>array(
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
        	
	),
)); ?>
