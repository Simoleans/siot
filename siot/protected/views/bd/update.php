<span class="ez"><a  name="respaldar" class="btn btn-danger pull-left"  href="<?=Yii::app()->request->baseUrl?>/bd/index">
	<i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
</span>
<!---consultas para traer usuario y apellido con criteria y la produccion -->
<?php 
//Traer nombre y apellido
$nombre = CHtml::encode($model->usuario->nombre); 
$apellido = CHtml::encode($model->usuario->apellido);

//traer producto
$id_producto = CHtml::encode($model->producto_id);
$id_producto = Productos::model()->find('id_producto=:id_producto', array('id_producto'=>$id_producto));
$nombre_producto = $id_producto->nombre_producto;
$fechas = substr($model->fecha_reporte,0,10);

 ?>

<h4 style="text-transform: uppercase;" align="center">
	Modificar Reporte de <b style="color: #8E0808"><?php echo $nombre.' '.$apellido; ?></b> 
	del producto <b style="color: #8E0808"><?php echo $nombre_producto ?></b>
</h4>
<br>

<?php $form=$this->beginWidget("CActiveForm"); ?>
<div class="row">
	<div class="col-md-2"></div>
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
				); ?> 
				<?php echo $form->error($model,'produccion'); ?>
			</div>
		</div>

		<div class="col-md-4">
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
		<div class="col-md-2"></div>
</div>
<div class="row">
		<div class="col-md-2"></div>
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
		<div class="col-md-2"></div>
</div>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-4">
		<div class="form-actions">
			<?php echo CHtml::submitButton("Actualizar",array("class"=>"btn btn-warning"));?>
		</div>
	</div>
	<div class="col-md-6"></div>
</div>
<?php $this->endWidget(); ?>