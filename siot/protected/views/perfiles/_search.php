<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--
	<div class="row">
		<?php echo $form->label($model,'id_perfil'); ?>
		<?php echo $form->textField($model,'id_perfil'); ?>
	</div>
	-->

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">		
				<?php echo $form->label($model,'nombre_perfil'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_perfil',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						)
				); ?>	
			</div>
		</div>
	</div>

	<!--
	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>
	-->
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>'Buscar',
			)); ?>
	</div>	

<?php $this->endWidget(); ?>
