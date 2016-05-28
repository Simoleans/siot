<?php
/* @var $this MarcasController */
/* @var $model Marcas */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'marcas-form',
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
				<?php echo $form->labelEx($model,'nombre_marca'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_marca',
					array(
						'size'=>60,
						'maxlength'=>100,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'nombre_marca'); ?>
			</div>
		</div>
	</div>	

	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR MARCA' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>	

<?php $this->endWidget(); ?>
