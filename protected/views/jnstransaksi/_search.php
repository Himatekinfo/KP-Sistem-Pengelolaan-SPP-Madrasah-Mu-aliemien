<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'JnstransaksiId'); ?>
		<?php echo $form->textField($model,'JnstransaksiId',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NamaJnsTransaksi'); ?>
		<?php echo $form->textField($model,'NamaJnsTransaksi',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BisaCicil'); ?>
		<?php echo $form->textField($model,'BisaCicil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PeriodeBayarId'); ?>
		<?php echo $form->textField($model,'PeriodeBayarId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JumlahPembayaran'); ?>
		<?php echo $form->textField($model,'JumlahPembayaran',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->