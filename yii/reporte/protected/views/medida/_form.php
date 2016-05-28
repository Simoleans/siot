<?php
/* @var $this MedidaController */
/* @var $model Medida */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medida-form',
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
				<?php echo $form->labelEx($model,'nombre_medida'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_medida',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'nombre_medida'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'abv_medida'); ?>
				<?php echo $form->textField(
					$model,
					'abv_medida',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'abv_medida'); ?>
			</div>
		</div>
	</div>	

	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR MEDIDA' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>	

<?php $this->endWidget(); ?>
