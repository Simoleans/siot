<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'producto-planta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<br>
	<?php echo $form->errorSummary($model); ?>	
	

	<?php $usuario = Yii::app()->user->getId(); //echo $usuario?>
	
	<?php 
		$modelUsuario=Usuarios::model()->find('id_usuario=:modelUsuario', array('modelUsuario'=>$usuario));
		$empresa = $modelUsuario->empresa_id;
		//echo $empresa;
	?>

	<div class="row">
		<div class="col-md-8">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'planta_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'planta_id',
					CHtml::listData(Plantas::model()->findAll(array("condition"=>"empresa_id =  $empresa","order"=>"id_planta")), 'id_planta', 'nombre_planta'),					
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE PLANTA...'
					)
				); ?>
				<?php echo $form->error($model,'planta_id'); ?>
			</div>
		</div>	
	</div>	
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'producto_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'producto_id',
					CHtml::listData(Productos::model()->findAll(), 'id_producto', 'nombre_producto'),
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE PRODUCTO...'
					)
				); ?>
				<?php echo $form->error($model,'producto_id'); ?>
			</div>
		</div>	
	</div>	
	
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'Estátus'); ?>
				<?php echo $form->dropDownList(
					$model,
					'activo',array(
						'1'=>'ACTIVO',
						'0'=>'INACTIVO'
					),
					array(
						'class' => 'form-control'
					)
				); ?>		
				<?php echo $form->error($model,'activo'); ?>
			</div>
		</div>
	</div>

	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>

<?php $this->endWidget(); ?>
