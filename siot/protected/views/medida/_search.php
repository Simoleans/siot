<?php
/* @var $this MedidaController */
/* @var $model Medida */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


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
						)
				); ?>
				<?php echo $form->error($model,'abv_medida'); ?>
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
