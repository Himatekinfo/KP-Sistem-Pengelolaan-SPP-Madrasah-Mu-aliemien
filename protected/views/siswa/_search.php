<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>

    <div class="row">
<?php echo $form->label($model, 'No_Induk'); ?>
<?php echo $form->textField($model, 'No_Induk', array('size' => 15, 'maxlength' => 15)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NIS'); ?>
<?php echo $form->textField($model, 'NIS', array('size' => 15, 'maxlength' => 15)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'NamaSiswa'); ?>
<?php echo $form->textField($model, 'NamaSiswa', array('size' => 30, 'maxlength' => 30)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'JK'); ?>
<?php echo $form->textField($model, 'JK', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'TempatLahir'); ?>
<?php echo $form->textField($model, 'TempatLahir', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'TanggalLahir'); ?>
<?php echo $form->textField($model, 'TanggalLahir'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'Ayah'); ?>
        <?php echo $form->textField($model, 'Ayah', array('size' => 50, 'maxlength' => 50)); ?>
    </div>
    <div class="row">
<?php echo $form->label($model, 'Ibu'); ?>
        <?php echo $form->textField($model, 'Ibu', array('size' => 50, 'maxlength' => 50)); ?>
    </div>
    <div class="row">
<?php echo $form->label($model, 'Alamat'); ?>
<?php echo $form->textField($model, 'Alamat', array('size' => 60, 'maxlength' => 200)); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->