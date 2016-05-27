<?php
/* @var $this TipoPlantaController */
/* @var $model TipoPlanta */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="col-md-5">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'nombre_tipo'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_tipo',
					array(
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'nombre_tipo'); ?>
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