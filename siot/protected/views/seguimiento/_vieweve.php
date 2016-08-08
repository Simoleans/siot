<?php
/* @var $this PlantasController */
/* @var $model Plantas */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'empresa-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>	

	<?php $usuario = Yii::app()->user->getId();?>
	
	<?php 
		$modelUsuario=Usuarios::model()->find('id_usuario=:modelUsuario', array('modelUsuario'=>$usuario));
		$empresa = $modelUsuario->empresa_id;		
	?>	
	
	<?php echo $form->hiddenField($model,'empresa_id',array('value'=>$empresa)); ?>
		
<?php if ($empresa != 'TODAS') { ?>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">		
				<?php echo $form->labelEx($model,'empresa_id'); ?>
				<?php echo $form->dropDownList($model,'empresa_id',
					CHtml::listData(Empresa::model()->findAll(),'id_empresa','razon_social'),
						array(
							'class' => 'form-control',
							'ajax'=>array(
							'type'=>'POST',
							'url'=>CController::createUrl('Empresa/SelectEmpresa'),
							'update'=>'#'.CHtml::activeId($model,'empresa_id'),
							'beforeSend' => 'function(){
								$(".Empresa").find("option").remove();
								}',
						
							),
							'prompt'=>'SELECCIONE EMPRESA...'
						)
				
					); ?>
				<?php echo $form->error($model,'empresa_id'); ?>
			</div>
		</div>

		<div class="col-md-1"><span>VS</span></div>

		<div class="col-md-4">
			<div class="form-group">		
				<?php echo $form->labelEx($model,'empresa_id'); ?>
				<?php echo $form->dropDownList($model,'empresa_id',
				echo $form->dropDownList($model,'empresa_id',$lista_dos,
					array(
						'class' => 'form-control Empresa',
						'ajax'=>array(
						'type'=>'POST',
						'url'=>CController::createUrl('Empresa/SelectEmpresa'),
						'update'=>'#'.CHtml::activeId($model,'empresa_id'),
						),
						'prompt'=>'SELECCIONE EMPRESA...'
						)
					); ?>

				<?php echo $form->error($model,'empresa_id'); ?>
			</div>
		</div>
	
	<hr>
<?php } ?>
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'COMPARAR' : 'OK',
			)); ?>
	</div>	

<?php $this->endWidget(); ?>
