<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'reportes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<br>
	<?php $usuario = Yii::app()->user->getId(); //echo 'ID del Usuario: '.$usuario?>

	<?php echo $form->hiddenField($model,'usuario_id',array('value'=>$usuario)); ?>
	
	<?php 
		$user_planta=Usuarios::model()->find('id_usuario=:user_planta', array('user_planta'=>$usuario));
		$planta = $user_planta->planta_id;
		//echo 'ID de planta del Usuario: '.$planta;	
	?>	
	

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'producto_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'producto_id',
					CHtml::listData(ProductoPlanta::model()->findAll(array("condition"=>"planta_id =  $planta")), 'producto.id_producto', 'producto.nombre_producto'),
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE PRODUCTO...'
					)
				); ?>
				<?php echo $form->error($model,'producto_id'); ?>
			</div>
		</div>
	
	
		<div class="col-md-6">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'produccion'); ?>
				<?php echo $form->textField(
					$model,
					'produccion',
					array(
						'maxlength'=>10,
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'produccion'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'Observación'); ?>
				<?php echo $form->textArea(
					$model,
					'descripcion',
					array(
						'rows'=>3,
						'cols'=>50,
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'descripcion'); ?>
			</div>
		</div>
	</div>	

	<?php echo $form->hiddenField($model,'fecha_reporte'); ?>

	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR REPORTE' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>

	<?php $this->endWidget(); ?>
