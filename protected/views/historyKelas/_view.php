<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('No_Induk')); ?>:</b>
	<?php echo CHtml::encode($data->No_Induk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KelasId')); ?>:</b>
	<?php echo CHtml::encode($data->KelasId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SekolahId')); ?>:</b>
	<?php echo CHtml::encode($data->SekolahId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JurusanId')); ?>:</b>
	<?php echo CHtml::encode($data->JurusanId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TahunAjaran')); ?>:</b>
	<?php echo CHtml::encode($data->TahunAjaran); ?>
	<br />


</div>