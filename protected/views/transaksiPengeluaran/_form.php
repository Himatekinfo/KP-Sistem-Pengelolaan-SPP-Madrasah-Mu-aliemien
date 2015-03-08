<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaksi-pengeluaran-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'Deskripsi'); ?>
		<?php echo $form->textField($model,'Deskripsi',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tanggal'); ?>
		<?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model'=>$model,
                        'attribute'=>'Tanggal',
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>"yy-mm-dd",
                        ),
                        
                        
                    ))
                ?>
		<?php echo $form->error($model,'Tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ket'); ?>
		<?php echo $form->textArea($model,'Ket',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Ket'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JumlahBenda'); ?>
		<?php echo $form->textField($model,'JumlahBenda',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'JumlahBenda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HargaSatuan'); ?>
		<?php echo $form->textField($model,'HargaSatuan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'HargaSatuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SatuanId'); ?>
		<?php echo $form->dropDownList($model,'SatuanId',$dataDdlSatuan); ?>
		<?php echo $form->error($model,'SatuanId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->