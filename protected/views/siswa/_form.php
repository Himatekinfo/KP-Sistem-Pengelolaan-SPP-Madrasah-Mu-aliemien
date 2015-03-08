<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'siswa-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

<div class="row">
<?php echo $form->labelEx($model, 'No_Induk'); ?>
<?php echo $form->textField($model, 'No_Induk', array('size' => 15, 'maxlength' => 15)); ?>
<?php echo $form->error($model, 'No_Induk'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'NIS'); ?>
<?php echo $form->textField($model, 'NIS', array('size' => 15, 'maxlength' => 15)); ?>
<?php echo $form->error($model, 'NIS'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'NamaSiswa'); ?>
<?php echo $form->textField($model, 'NamaSiswa', array('size' => 30, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'NamaSiswa'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model, 'RBL'); ?>
<?php echo $form->textField($model, 'RBL', array('size' => 5, 'maxlength' => 5)); ?>
<?php echo $form->error($model, 'RBL'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'JK'); ?>
<?php echo $form->dropDownList($model, 'JK', array('L' => 'Laki-Laki', 'P' => 'Perempuan')); ?>
<?php echo $form->error($model, 'JK'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'TempatLahir'); ?>
<?php echo $form->textField($model, 'TempatLahir', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'TempatLahir'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'TanggalLahir'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'TanggalLahir',
        'options' => array(
            'showAnim' => 'fold',
            'dateFormat' => "yy-mm-dd",
        ),
    ))
    ?>
    <?php echo $form->error($model, 'TanggalLahir'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'Ayah'); ?>
    <?php echo $form->textField($model, 'Ayah', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'Ayah'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'Ibu'); ?>
    <?php echo $form->textField($model, 'Ibu', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'Ibu'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'Pekerjaan_ortu'); ?>
    <?php echo $form->textField($model, 'Pekerjaan_ortu', array('size' => 30, 'maxlength' => 30)); ?>
    <?php echo $form->error($model, 'Pekerjaan_ortu'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'Ekonomi'); ?>
    <?php echo $form->textField($model, 'Ekonomi', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'Ekonomi'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'No_STTB'); ?>
    <?php echo $form->textField($model, 'No_STTB', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'No_STTB'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'Asal_Sekolah'); ?>
    <?php echo $form->textArea($model, 'Asal_Sekolah', array('size' => 200, 'maxlength' => 200)); ?>
    <?php echo $form->error($model, 'Asal_Sekolah'); ?>
</div>


<div class="row">
    <?php echo $form->labelEx($modelhistorykelas, 'KelasId'); ?>
    <?php echo $form->dropDownList($modelhistorykelas, 'KelasId', $dataDdlKelas); ?>
    <?php echo $form->error($modelhistorykelas, 'KelasId'); ?>
</div>
<!-- cara untuk mngatur hak akses -->
<div class="row">
    <?php echo $form->labelEx($modelhistorykelas, 'SekolahId'); ?>
    <?php echo $modelhistorykelas->sekolah->Sekolah; ?>
    <?php echo $form->error($modelhistorykelas, 'SekolahId'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($modelhistorykelas, 'JurusanId'); ?>
    <?php echo $form->dropDownList($modelhistorykelas, 'JurusanId', $dataDdlJurusan); ?>
    <?php echo $form->error($modelhistorykelas, 'JurusanId'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($modelhistorykelas, 'TahunAjaran'); ?>
    <?php echo $form->dropDownList($modelhistorykelas, 'TahunAjaran', $dataDdltahunajaran); ?>
    <?php echo $form->error($modelhistorykelas, 'TahunAjaran'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'Alamat'); ?>
    <?php echo $form->textArea($model, 'Alamat', array('size' => 60, 'maxlength' => 200)); ?>
    <?php echo $form->error($model, 'Alamat'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->