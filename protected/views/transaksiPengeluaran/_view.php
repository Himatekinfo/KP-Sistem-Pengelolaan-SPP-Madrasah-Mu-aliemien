<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user.UserName')); ?>:</b>
	<?php echo CHtml::encode($data->user->UserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->Deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->Tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ket')); ?>:</b>
	<?php echo CHtml::encode($data->Ket); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JumlahBenda')); ?>:</b>
	<?php echo CHtml::encode($data->JumlahBenda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HargaSatuan')); ?>:</b>
	<?php echo CHtml::encode($data->HargaSatuan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('SatuanId')); ?>:</b>
	<?php echo CHtml::encode($data->SatuanId); ?>
	<br />

	*/ ?>

</div>