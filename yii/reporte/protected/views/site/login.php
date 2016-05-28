<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Iniciar Sesión';
$this->breadcrumbs=array(
	'Iniciar Sesión',
);
?>
	
	<div class='col-sm-12'>
		<div class="center-block">
			<div style="margin:40px">
			<img align="center" class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-foot.png">
			</div>
			<div id="bglogin">
				<fieldset>
					<legend>Iniciar Sesión</legend>

					<div class="form">
						<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
							'id'=>'login-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
						)); ?>
						
						<div class="alert alert-warning">
							<p class="note">Campos con * son requeridos.</p>
						</div>
						
						<?php 
						
							echo $form->labelEx($model,'username'); 
							echo $form->textField(
								$model,
								'username',
								array(
									'size'=>60,
									'maxlength'=>100,
									'class'=>'form-control',
									)
							); 
							echo $form->error($model,'username');
							
							echo $form->labelEx($model,'password'); 
							echo $form->passwordField(
								$model,
								'password',
								array(
									'size'=>60,
									'maxlength'=>100,
									'class'=>'form-control'
									)
							); 
							echo $form->error($model,'password');
							
							//echo $this->renderPartial('_form', array('model'=>$model));							
						
						?>	
						
						<!--
						<div class="row rememberMe">
							<?php echo $form->checkBox($model,'rememberMe'); ?>
							<?php echo $form->label($model,'rememberMe'); ?>
							<?php echo $form->error($model,'rememberMe'); ?>
						</div>
						-->
						<br>
						<div align='right' class='col-sm-12' style="padding:0">
							<?php 
								$this->widget(
									'booster.widgets.TbButton',
									array(
										'buttonType' => 'submit',
										'context' => 'primary',
										'label' => 'ENTRAR'
									)
								); 
							?>
						</div>						
						<div class="clearfix"></div>
						<br>
						<?php $this->endWidget(); ?>
						
					</div><!-- form -->
				</fieldset>
			</div><br><br>
		</div>
	</div>