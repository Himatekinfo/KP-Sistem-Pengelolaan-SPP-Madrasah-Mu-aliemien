<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('JnstransaksiId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->JnstransaksiId), array('view', 'id'=>$data->JnstransaksiId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NamaJnsTransaksi')); ?>:</b>
	<?php echo CHtml::encode($data->NamaJnsTransaksi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BisaCicil')); ?>:</b>
	<?php echo CHtml::encode($data->BisaCicil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PeriodeBayarId')); ?>:</b>
	<?php echo CHtml::encode($data->PeriodeBayarId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JumlahPembayaran')); ?>:</b>
	<?php echo CHtml::encode($data->JumlahPembayaran); ?>
	<br />


</div>