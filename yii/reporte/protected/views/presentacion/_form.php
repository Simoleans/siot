<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'presentacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<br>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'nombre_presentacion'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_presentacion',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'nombre_presentacion'); ?>
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'contenido'); ?>
				<?php echo $form->textField(
					$model,
					'contenido',
					array(
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'contenido'); ?>
			</div>
		</div>
	</div>	
	
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'medida_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'medida_id',
					CHtml::listData(Medida::model()->findAll(), 'id_medida', 'nombre_medida'),
					array(
						'class'=>'form-control',
						'prompt'=>'SELECCIONE MEDIDA...'
						)
				); ?>
				<?php echo $form->error($model,'medida_id'); ?>
			</div>
		</div>
	</div>	

	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR PRESENTACIÓN' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>	

<?php $this->endWidget(); ?>
