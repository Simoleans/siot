<?php
/* @var $this GerenciaController */
/* @var $model Gerencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gerencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sede_id'); ?>
		<?php echo $form->dropDownList($model,'sede_id', CHtml::listData(Sede::model()->findAll(), 'id_sede', 'nombre')); ?>
		<?php echo $form->error($model,'sede_id'); ?>
	</div>
hola
	<div class="row">
		<?php echo $form->labelEx($model,'nombre_gerencia'); ?>
		<?php echo $form->textField($model,'nombre_gerencia',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre_gerencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gerente'); ?>
		<?php echo $form->textField($model,'gerente',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'gerente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ubicacion'); ?>
		<?php echo $form->textArea($model,'ubicacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ubicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_registro'); ?>
		<?php echo $form->textField($model,'fecha_registro'); ?>
		<?php echo $form->error($model,'fecha_registro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->