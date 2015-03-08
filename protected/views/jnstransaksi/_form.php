<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jns-transaksi-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NamaJnsTransaksi'); ?>
		<?php echo $form->textField($model,'NamaJnsTransaksi',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'NamaJnsTransaksi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BisaCicil'); ?>
		<?php echo $form->checkBox($model,'BisaCicil',array('value'=>1)); ?>
		<?php echo $form->error($model,'BisaCicil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PeriodeBayarId'); ?>
		<?php echo $form->dropDownList($model,'PeriodeBayarId',$dataDdlPeriodebayar); ?>
		<?php echo $form->error($model,'PeriodeBayarId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JumlahPembayaran'); ?>
		<?php echo $form->textField($model,'JumlahPembayaran',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'JumlahPembayaran'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->