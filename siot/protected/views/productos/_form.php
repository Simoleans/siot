<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'productos-form',
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
		<div class="col-md-6">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'nombre_producto'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_producto',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'nombre_producto'); ?>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'rubro_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'rubro_id',
					CHtml::listData(Rubros::model()->findAll(), 'id_rubro', 'nombre_rubro'),
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE RUBRO...'
					)
				); ?>
				<?php echo $form->error($model,'rubro_id'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'marca_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'marca_id',
					CHtml::listData(Marcas::model()->findAll(), 'id_marca', 'nombre_marca'),
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE MARCA...'
					)
				); ?>
				<?php echo $form->error($model,'marca_id'); ?>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'presentacion_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'presentacion_id',
					CHtml::listData(Presentacion::model()->findAll(), 'id_presentacion', 'nombre_presentacion'),
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE PRESENTACIÓN...'
					)
				); ?>
				<?php echo $form->error($model,'presentacion_id'); ?>
			</div>
		</div>
	</div>	

	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR PRODUCTO' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>	

<?php $this->endWidget(); ?>