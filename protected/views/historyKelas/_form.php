<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'history-kelas-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


<div class="row">
    <?php echo $form->labelEx($model, 'No_Induk'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'model' => $model,
        'attribute' => 'No_Induk',
        'sourceUrl' => array('HistoryKelas/getnis'),
        // additional javascript options for the autocomplete plugin
        'options' => array(
            'minLength' => '2',
        ),
    ));
    ?>

</div>



<div class="row">
    <?php echo $form->labelEx($model, 'KelasId'); ?>
    <?php echo $form->dropDownList($model, 'KelasId', $dataDdlKelas); ?>
    <?php echo $form->error($model, 'KelasId'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'SekolahId'); ?>
    <?php echo $form->label($model, 'SekolahId'); ?>
    <?php echo $form->error($model, 'SekolahId'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'JurusanId'); ?>
    <?php echo $form->dropDownList($model, 'JurusanId', $dataDdlJurusan); ?>
    <?php echo $form->error($model, 'JurusanId'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'TahunAjaran'); ?>
    <?php echo $form->dropDownList($model, 'TahunAjaran', $dataDdltahunajaran); ?>
    <?php echo $form->error($model, 'TahunAjaran'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->