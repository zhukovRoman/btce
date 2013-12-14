<?php
/* @var $this InfoController */
/* @var $data Info */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('high')); ?>:</b>
	<?php echo CHtml::encode($data->high); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('low')); ?>:</b>
	<?php echo CHtml::encode($data->low); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avg')); ?>:</b>
	<?php echo CHtml::encode($data->avg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vol')); ?>:</b>
	<?php echo CHtml::encode($data->vol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vol_cur')); ?>:</b>
	<?php echo CHtml::encode($data->vol_cur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last')); ?>:</b>
	<?php echo CHtml::encode($data->last); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('buy')); ?>:</b>
	<?php echo CHtml::encode($data->buy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sell')); ?>:</b>
	<?php echo CHtml::encode($data->sell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pair')); ?>:</b>
	<?php echo CHtml::encode($data->pair); ?>
	<br />

	*/ ?>

</div>