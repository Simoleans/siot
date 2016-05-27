<?php
/* @var $this MarcasController */
/* @var $model Marcas */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

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
						)
				); ?>
				<?php echo $form->error($model,'nombre_marca'); ?>
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