<?php
$this->breadcrumbs=array(
	'Jns Transaksis'=>array('index'),
	'Manage',
);

?>

<div>
	<div>
		<?php echo CHtml::form(); ?>
		<?php echo CHtml::dropDownList("as", "0", array_merge(array("0"=>"Semua"), array("d"=>"Hari", "m"=>"Bulan"))); ?>
		<?php echo CHtml::dropDownList("day", "0", array_merge(array("0"=>"Hari"), StaticHelper::GetYears(1, 31))); ?>
		<?php echo CHtml::dropDownList("month", "0", array_merge(array("0"=>"Bulan"), StaticHelper::GetYears(1, 12))); ?>
		<?php echo CHtml::submitButton("Filter"); ?>
            	<?php echo CHtml::submitButton("Cetak"); ?>
		<?php echo CHtml::endForm(); ?>
	</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'report-transaksi-grid',
	'dataProvider'=>$model,
//	'filter'=>$model,
	'columns'=>array(
		'TransactionDate',
		'TransactionDescription',
		'ItemCount',
		'ItemPrice',
		'Debet',
		'Credit',
	),
)); ?>
<div>
	<div><span>Total Debet: </span><span><?php echo reset($modelTotal); ?></span></div>
	<div><span>Total Credit: </span><span><?php echo next($modelTotal); ?></span></div>
</div>