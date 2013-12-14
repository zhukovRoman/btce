<?php
/* @var $this InfoController */
/* @var $model Info */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'high'); ?>
		<?php echo $form->textField($model,'high'); ?>
		<?php echo $form->error($model,'high'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'low'); ?>
		<?php echo $form->textField($model,'low'); ?>
		<?php echo $form->error($model,'low'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avg'); ?>
		<?php echo $form->textField($model,'avg'); ?>
		<?php echo $form->error($model,'avg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vol'); ?>
		<?php echo $form->textField($model,'vol'); ?>
		<?php echo $form->error($model,'vol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vol_cur'); ?>
		<?php echo $form->textField($model,'vol_cur'); ?>
		<?php echo $form->error($model,'vol_cur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last'); ?>
		<?php echo $form->textField($model,'last'); ?>
		<?php echo $form->error($model,'last'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buy'); ?>
		<?php echo $form->textField($model,'buy'); ?>
		<?php echo $form->error($model,'buy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sell'); ?>
		<?php echo $form->textField($model,'sell'); ?>
		<?php echo $form->error($model,'sell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated'); ?>
		<?php echo $form->textField($model,'updated'); ?>
		<?php echo $form->error($model,'updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pair'); ?>
		<?php echo $form->textArea($model,'pair',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pair'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->