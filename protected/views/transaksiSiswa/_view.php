<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user.UserName')); ?>:</b>
	<?php echo CHtml::encode($data->user->UserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jnstransaksi.NamaJnstransaksi')); ?>:</b>
	<?php echo CHtml::encode($data->jnstransaksi->NamaJnsTransaksi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('No_IndukSiswa')); ?>:</b>
	<?php echo CHtml::encode($data->No_IndukSiswa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TanggalTransaksi')); ?>:</b>
	<?php echo CHtml::encode($data->TanggalTransaksi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->Jumlah); ?>
	<br />


</div>