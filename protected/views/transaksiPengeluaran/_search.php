<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserId'); ?>
		<?php echo $form->textField($model,'UserId',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Deskripsi'); ?>
		<?php echo $form->textField($model,'Deskripsi',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tanggal'); ?>
		<?php echo $form->textField($model,'Tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ket'); ?>
		<?php echo $form->textField($model,'Ket',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JumlahBenda'); ?>
		<?php echo $form->textField($model,'JumlahBenda',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HargaSatuan'); ?>
		<?php echo $form->textField($model,'HargaSatuan',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SatuanId'); ?>
		<?php echo $form->textField($model,'SatuanId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->