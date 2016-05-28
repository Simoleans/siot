<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'nombre_producto'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_producto',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'nombre_producto'); ?>
			</div>
		</div>
	</div>	
	
	<div class="row">
		<div class="col-md-3">
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
		<div class="col-md-3">
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
	</div>
	
	<div class="row">
		<div class="col-md-4">
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

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>'BUSCAR',
			)); ?>
	</div>
<?php $this->endWidget(); ?>