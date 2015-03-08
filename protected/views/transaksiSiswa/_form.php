<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaksi-siswa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'JnstransaksiId'); ?>
		<?php echo $form->dropDownList($model,'JnstransaksiId',$dataDdljnstransaksi); ?>
		<?php echo $form->error($model,'JnstransaksiId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'No_IndukSiswa'); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'=>$model,
                        'attribute'=>'No_IndukSiswa',
                        'sourceUrl'=>array('transaksisiswa/getnis'),
                        // additional javascript options for the autocomplete plugin
                        'options'=>array(
                            'minLength'=>'2',
                        ),

                    ));
                ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TanggalTransaksi'); ?>
		
		<?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model'=>$model,
                        'attribute'=>'TanggalTransaksi',
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>"yy-mm-dd",
                        ),
                        
                        
                    ))
                ?>
		<?php echo $form->error($model,'TanggalTransaksi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Jumlah'); ?>
		<?php echo $form->textField($model,'Jumlah',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Jumlah'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->