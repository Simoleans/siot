<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'perfiles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<br>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'nombre_perfil'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_perfil',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'nombre_perfil'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'activo'); ?>
				<?php echo $form->dropDownList(
					$model,
					'activo',array(
						'1'=>'SI',
						'0'=>'NO'
					),
					array(
						'class' => 'form-control'
					)
				); ?>		
				<?php echo $form->error($model,'activo'); ?>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR PERFIL' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>

<?php $this->endWidget(); ?>