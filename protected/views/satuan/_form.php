<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'satuan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Satuan'); ?>
		<?php echo $form->textField($model,'Satuan',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Satuan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->