<?php 

	$form=$this->beginWidget('booster.widgets.TbActiveForm', array(

	)); 	
	
?>

	<?php if(CCaptcha::checkRequirements()): ?>
		<div class="row">
			<?php echo $form->labelEx($model,'verifyCode'); ?>
			<div align="right">
				<?php $this->widget('CCaptcha'); ?>
			</div>
			<?php echo $form->textField(
				$model,
					'verifyCode',array(
					'class'=>'form-control',
					)
				); 
			?>			
			<div class="hint" align="justify">
				Introduzca las letras que aparecen arriba.
				<br/>No hay distinción entre mayúsculas y minúsculas.
			</div>
			<?php echo $form->error($model,'verifyCode'); ?>
		</div>
	<?php endif; ?>

	<?php $this->endWidget(); ?>