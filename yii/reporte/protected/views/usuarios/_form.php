<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<br>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'cedula'); ?>
				<?php echo $form->textField(
					$model,
					'cedula',
					array(
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'cedula'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'nombre'); ?>
				<?php echo $form->textField(
					$model,
					'nombre',
					array(
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'apellido'); ?>
				<?php echo $form->textField(
					$model,
					'apellido',
					array(
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'apellido'); ?>
			</div>
		</div>
	</div>	

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->datePickerGroup($model,'fecha_nac',
					array(
						'widgetOptions'=>array(
							'options'=>array(
							),
							'htmlOptions'=>array(
								'class'=>'form-control'
							)
						), 
						'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>'
					)
				); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'correo'); ?>
				<?php echo $form->textField(
					$model,
					'correo',
					array(
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'correo'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'telefono'); ?>
				<?php echo $form->textField(
					$model,
					'telefono',
					array(
						'maxlength'=>255,
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'telefono'); ?>
			</div>
		</div>
	</div>	

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'perfil_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'perfil_id',
					CHtml::listData(Perfiles::model()->findAll(), 'id_perfil', 'nombre_perfil'),
					array(
						'class' => 'form-control',
						'prompt'=>'SELECCIONE PERFIL...'
					)
				); ?>				
				<?php echo $form->error($model,'perfil_id'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'empresa_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'empresa_id',
					CHtml::listData(Empresa::model()->findAll(), 'id_empresa', 'razon_social'),
						array(
							'class' => 'form-control',
							'ajax'=>array(
							'type'=>'POST',
							'url'=>CController::createUrl('Usuarios/SelectPlanta'),
							'update'=>'#'.CHtml::activeId($model,'planta_id'),
						
							),
							'prompt'=>'SELECCIONE EMPRESA...'
						)
				); ?>				
				<?php echo $form->error($model,'empresa_id'); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'planta_id'); ?>
				<?php echo $form->dropDownList($model,
					'planta_id',
						array(),
						array('class' => 'form-control','prompt'=>'SELECCIONE PLANTA...')
						); ?>				
				<?php echo $form->error($model,'planta_id'); ?>
			</div>
		</div>			
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'usuario'); ?>
				<?php echo $form->textField(
					$model,
					'usuario',
					array(
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'usuario'); ?>
			</div>
		</div>	
	
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'contraseña'); ?>
				<?php echo $form->textField(
					$model,
					'contraseña',
					array(
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'contraseña'); ?>
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'activo'); ?>
				<?php echo $form->dropDownList(
					$model,
					'activo',array(
						'1'=>'SI',
						'0'=>'NO'
					),
					array(
						'class' => 'form-control'
					)
				); ?>		
				<?php echo $form->error($model,'activo'); ?>
			</div>
		</div>	
	</div>	


	<?php //echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR USUARIO' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>

	<?php $this->endWidget(); ?>
