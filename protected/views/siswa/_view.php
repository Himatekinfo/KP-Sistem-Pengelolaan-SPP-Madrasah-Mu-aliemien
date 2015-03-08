<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('No_Induk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->No_Induk), array('view', 'id'=>$data->No_Induk)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('NIS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NIS), array('view', 'id'=>$data->NIS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NamaSiswa')); ?>:</b>
	<?php echo CHtml::encode($data->NamaSiswa); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('RBL')); ?>:</b>
	<?php echo CHtml::encode($data->RBL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JK')); ?>:</b>
	<?php echo CHtml::encode($data->JK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TempatLahir')); ?>:</b>
	<?php echo CHtml::encode($data->TempatLahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TanggalLahir')); ?>:</b>
	<?php echo CHtml::encode($data->TanggalLahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ayah')); ?>:</b>
	<?php echo CHtml::encode($data->Ayah); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('Ibu')); ?>:</b>
        <?php echo CHtml::encode($data->Ibu); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('Alamat')); ?>:</b>
	<?php echo CHtml::encode($data->Alamat); ?>
	<br />


</div>