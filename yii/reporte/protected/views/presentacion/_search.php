<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

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
						)
				); ?>
				<?php echo $form->error($model,'nombre_presentacion'); ?>
			</div>
		</div>
	</div>	
	
	<div class="row">
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
		<div class="col-md-3">
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

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>'BUSCAR'
			)); ?>
	</div>

	<?php $this->endWidget(); ?>
