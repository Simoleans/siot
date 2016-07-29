<span class="ez"><a  name="respaldar" class="btn btn-danger pull-left"  href="<?=Yii::app()->request->baseUrl?>/bd/index">
	<i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
</span>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'reportes-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<h3><div class="flash-' . $key . '" style="color:red; text-align:center">' . $message . "</div></h3>\n";
                                
                    
                        
                }
        }
?>
	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8"><p class="note">Campos con <span class="required">*</span> son requeridos.</p></div>
		<div class="col-md-3"></div>
	</div>
	<?php echo $form->errorSummary($model); ?>	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-3">
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
		<div class="col-md-3">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'usuario_id'); ?> 
				<?php echo $form->dropDownList(
					$model,
					'usuario_id',
					CHtml::listData(Usuarios::model()->findAll(array("condition"=>"perfil_id = 3")), 'id_usuario', 'usuario'),
					array(
						'class' => 'form-control',
						'prompt' => 'SELECCIONE USUARIO...'
					)
				); ?>
				<?php echo $form->error($model,'usuario_id'); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'produccion'); ?> <strong>EN KILOGRAMOS</strong>
				<?php echo $form->textField(
					$model,
					'produccion',
					array(
						'maxlength'=>10,
						'class'=>'form-control',
						)
				); ?> <span><h6><span class="required">*</span>Si la produccion es 0, coloque la observacion y deje este campo vacio</h6></span>
				<?php echo $form->error($model,'produccion'); ?>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	<div class="row">	
		<div class="col-md-1"></div>
		<div class="col-md-3">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'fecha_reporte'); ?> <span class="required">*</span>
				<?php echo $form->textField(
					$model,
					'fecha_reporte',
					array(
						'maxlength'=>50,
						'class'=>'form-control',
						
						)
				); ?> 
				
			</div>
		</div>
		<div class="col-md-7">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'Observacion'); ?>
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
		<div class="col-md-1"></div>
	</div>	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<div class="form-actions" style="padding-left: 5%">
				<?php echo CHtml::submitButton("Guardar",array("class"=>"btn btn-primary"));?>
			</div>
		</div>
		<div class="col-md-9"></div>
		
	</div>
<?php $this->endWidget(); ?>
