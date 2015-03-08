<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'periode-bayar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PeriodeBayar'); ?>
		<?php echo $form->textField($model,'PeriodeBayar',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'PeriodeBayar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->