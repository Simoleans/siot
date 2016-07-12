<?php
/* @var $this PlantasController */
/* @var $model Plantas */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'empresa-form',
	'enableAjaxValidation'=>true,
)); ?>

<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<h3><div class="flash-' . $key . '" style="color:red; text-align:center">' . $message . "</div></h3>\n";                        
                }
        }
?>
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<br>
	<?php echo $form->errorSummary($model); ?>	

	<?php $usuario = Yii::app()->user->getId();?>
	
	<?php 
		$modelUsuario=Usuarios::model()->find('id_usuario=:modelUsuario', array('modelUsuario'=>$usuario));
		$empresa = $modelUsuario->empresa_id;		
	?>	
	
	<?php echo $form->hiddenField($model,'empresa_id',array('value'=>$empresa)); ?>
		
	<div class="row">		
		<div class="col-md-8">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'nombre_planta'); ?>
				<?php echo $form->textField(
					$model,
					'nombre_planta',
					array(
						'size'=>60,
						'maxlength'=>255,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'nombre_planta'); ?>
			</div>
		</div>	

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'tipo_id'); ?>
				<?php echo $form->dropDownList(
					$model,
					'tipo_id',
					CHtml::listData(TipoPlanta::model()->findAll(), 'id_tipo', 'nombre_tipo'),
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE TIPO...'
					)
				); ?>
				<?php echo $form->error($model,'tipo_id'); ?>
			</div>
		</div>	
	</div>	

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">		
				<?php echo $form->labelEx($model,'estado_id'); ?>
				<?php echo $form->dropDownList($model,'estado_id',
					CHtml::listData(Estado::model()->findAll(),'id_estado','estado'),
						array(
							'class' => 'form-control',
							'ajax'=>array(
							'type'=>'POST',
							'url'=>CController::createUrl('Plantas/SelectMunicipio'),
							'update'=>'#'.CHtml::activeId($model,'municipio_id'),
							'beforeSend' => 'function(){
								$("#Plantas_municipio_id").find("option").remove();
								$("#Plantas_parroquia_id").find("option").remove();
								}',
						
							),
							'prompt'=>'SELECCIONE ESTADO...'
						)
				
					); ?>
				<?php echo $form->error($model,'estado_id'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">		
				<?php echo $form->labelEx($model,'municipio_id'); ?>
				<?php 
				$lista_dos = array();
				if(isset($model->municipio_id)){
					$id_uno = intval($model->estado_id);
					$lista_dos = CHtml::listData(Municipio::model()->findAll("estado_id = '$id_uno'"),'id_municipio','municipio');
					
				}
				echo $form->dropDownList($model,'municipio_id',$lista_dos,
					array(
						'class' => 'form-control',
						'ajax'=>array(
						'type'=>'POST',
						'url'=>CController::createUrl('Plantas/SelectParroquia'),
						'update'=>'#'.CHtml::activeId($model,'parroquia_id'),
						'beforeSend' => 'function(){
							$("#Plantas_parroquia_id").find("option").remove();
							}',
						
						),
						'prompt'=>'SELECCIONE MUNICIPIO...'
						)
					); ?>

				<?php echo $form->error($model,'municipio_id'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'parroquia_id'); ?>
				<?php 
				$lista_tres = array();
				if(isset($model->parroquia_id)){
					$id_dos = intval($model->municipio_id);
					$lista_tres = CHtml::listData(Parroquia::model()->findAll("municipio_id = '$id_dos'"),'id_parroquia','parroquia');
					
				}		
				
				echo $form->dropDownList($model,'parroquia_id',$lista_tres,
					array(
						'class' => 'form-control',
						'prompt'=>'SELECCIONES PARROQUIA...'
					)
				); ?>
				<?php echo $form->error($model,'parroquia_id'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">		
				<?php echo $form->labelEx($model,'descripcion'); ?>
				<?php echo $form->textArea($model,'descripcion',array('rows'=>2, 'cols'=>60, 'class' => 'form-control', 'style'=>'text-transform:uppercase')); ?>
				<?php echo $form->error($model,'descripcion'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'cap_inst'); ?>
				<?php echo $form->textField(
					$model,
					'cap_inst',
					array(
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'cap_inst'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'cap_ope'); ?>
				<?php echo $form->textField(
					$model,
					'cap_ope',
					array(
						'class'=>'form-control',
						)
				); ?>				
				<?php echo $form->error($model,'cap_ope'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'cap_alm'); ?>
				<?php echo $form->textField(
					$model,
					'cap_alm',
					array(
						'class'=>'form-control',
						)
				); ?>				
				<?php echo $form->error($model,'cap_alm'); ?>
			</div>
		</div>				
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'alm_seco'); ?>
				<?php echo $form->textField(
					$model,
					'alm_seco',
					array(
						'class'=>'form-control',
						)
				); ?>				
				<?php echo $form->error($model,'alm_seco'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'alm_frio'); ?>
				<?php echo $form->textField(
					$model,
					'alm_frio',
					array(
						'class'=>'form-control',
						)
				); ?>				
				<?php echo $form->error($model,'alm_frio'); ?>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'alm_silo'); ?>
				<?php echo $form->textField(
					$model,
					'alm_silo',
					array(
						'class'=>'form-control',
						)
				); ?>
				<?php echo $form->error($model,'alm_silo'); ?>
			</div>
		</div>
	</div>

	<div class="row">
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
	
		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'cant_lineas'); ?>
				<?php echo $form->dropDownList(
					$model,
					'cant_lineas',array('1','2','3','4','5','6','7','8','9','10'),
					array(
						'class' => 'form-control'
					)
				); ?>		
				<?php echo $form->error($model,'cant_lineas'); ?>
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'estatus_lineas'); ?>
				<?php echo $form->dropDownList(
					$model,
					'estatus_lineas',array(
						'1'=>'SI',
						'0'=>'NO'
					),
					array(
						'class' => 'form-control'
					)
				); ?>		
				<?php echo $form->error($model,'estatus_lineas'); ?>
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'cant_empleados'); ?>
				<?php echo $form->textField(
					$model,
					'cant_empleados',
					array(
						'class'=>'form-control',
						)
				); ?>		
				<?php echo $form->error($model,'cant_empleados'); ?>
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'longitud'); ?>
				<?php echo $form->textField(
					$model,
					'longitud',
					array(
						'size'=>20,
						'maxlength'=>100,
						'class'=>'form-control',
						)
				); ?>			
				<?php echo $form->error($model,'longitud'); ?>
			</div>
		</div>				

		<div class="col-md-2">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'latitud'); ?>
				<?php echo $form->textField(
					$model,
					'latitud',
					array(
						'size'=>20,
						'maxlength'=>100,
						'class'=>'form-control',
						)
				); ?>				
				<?php echo $form->error($model,'latitud'); ?>
			</div>
		</div>						
	</div>
	
	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR PLANTA' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>	

<?php $this->endWidget(); ?>
