<span class="ez"><a  name="respaldar" class="btn btn-success pull-left"  href="<?=Yii::app()->request->baseUrl?>/bd/index">Volver</a></span>
<!---consultas para traer usuario y apellido con criteria y la produccion -->
<?php 
//Traer nombre y apellido
$nombre = CHtml::encode($model->usuario->nombre); 
$apellido = CHtml::encode($model->usuario->apellido);

//traer producto
$id_producto = CHtml::encode($model->producto_id);
$id_producto = Productos::model()->find('id_producto=:id_producto', array('id_producto'=>$id_producto));
$nombre_producto = $id_producto->nombre_producto;

 ?>



<h2>Modificar Reporte de <?php echo $nombre.' '.$apellido; ?> de producto <?php echo $nombre_producto ?></h2>
<br>

<?php $form=$this->beginWidget("CActiveForm"); ?>


<div class="row">
<div class="col-md-3">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'produccion'); ?> <strong>EN KILOGRAMOS</strong>
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

		<div class="col-md-3">
			<div class="form-group">	
				<?php echo $form->labelEx($model,'fecha_reporte'); ?>
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
	</div>

	<div class="row">
		<div class="col-md-8">
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
	</div>

	<hr>
	<div class="form-actions">
		<?php echo CHtml::submitButton("Actualizar",array("class"=>"btn btn-success"));?>
	</div>

	<?php $this->endWidget(); ?>