<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>



<?php 

	$form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'id'=>'empresa-form',
		'enableAjaxValidation'=>true,
	)); 	
	
?>
	
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<br>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<?php echo $form->labelEx($model,'razon_social'); ?>
				<?php echo $form->textField(
					$model,
					'razon_social',
					array(
						'size'=>60,
						'maxlength'=>100,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
						)
				); ?>
				<?php echo $form->error($model,'razon_social'); ?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'rif'); ?>
				<?php echo $form->textField(
					$model,
					'rif',
					array(
						'size'=>12,
						'maxlength'=>12,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
					)
				); ?>
				<?php echo $form->error($model,'rif'); ?>
			</div>
		</div>			

		<div class="col-md-5">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'telefono'); ?>
				<?php echo $form->textField(
					$model,
					'telefono',array(
						'size'=>20,
						'maxlength'=>20,
						'class'=>'form-control',
					)
				); ?>
				<?php echo $form->error($model,'telefono'); ?>
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

	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<?php echo $form->labelEx($model,'contacto'); ?>
				<?php echo $form->textField(
					$model,
					'contacto',array(
						'size'=>60,
						'maxlength'=>100,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
					)
				); ?>
				<?php echo $form->error($model,'contacto'); ?>
			</div>
		</div>

		<div class="col-md-7">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'correo'); ?>
				<?php echo $form->textField(
					$model,
					'correo',array(
						'size'=>50,
						'maxlength'=>50,
						'class'=>'form-control',
						'style'=>'text-transform:uppercase'
					)
				); ?>
				<?php echo $form->error($model,'correo'); ?>
			</div>
		</div>

	</div>
	
		<?php //echo $form->textAreaGroup($model,'AF_Telefono', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">		
				<?php echo $form->labelEx($model,'direccion'); ?>
				<?php echo $form->textArea(
					$model,
					'direccion',array(
						'rows'=>4, 
						'cols'=>100,
						'class' => 'form-control',
						'style'=>'text-transform:uppercase'
					)
				); ?>
				<?php echo $form->error($model,'direccion'); ?>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'CREAR EMPRESA' : 'GUARDAR CAMBIOS',
			)); ?>
	</div>

<?php $this->endWidget(); ?>

