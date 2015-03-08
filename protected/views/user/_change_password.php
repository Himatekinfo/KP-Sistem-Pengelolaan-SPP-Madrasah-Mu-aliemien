<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Ketikan password <span class="required">*</span> tebaru anda.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>30,'maxlength'=>30, 'value'=>"")); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_verify'); ?>
		<?php echo $form->passwordField($model,'password_verify',array('size'=>30,'maxlength'=>30,  'value'=>"")); ?>
		<?php echo $form->error($model,'password_verify'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->