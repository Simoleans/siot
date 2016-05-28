<?php
/* @var $this EmpresaController */
/* @var $data Empresa */
?>

<div>

	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_empresa), array('view', 'id'=>$data->id_empresa)); ?>
	<br />
	-->
	
	<?php $empresa = CHtml::encode($data->razon_social);?> 
		
	<?php if ($empresa != 'TODAS') { ?>
		<hr>
		<div class="row">
			<div class="col-md-9">			
				<table class="table table-striped table-bordered">
					<tr align="center">
						<td>
							<b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?></b>
						</td>
					</tr>	
					<tr align="center">
						<td>
							<?php echo CHtml::link(CHtml::encode($data->razon_social), array('view', 'id'=>$data->id_empresa)); ?>
						</td>
					</tr>						
				</table>
			</div>
			<div class="col-md-3">			
				<table class="table table-striped table-bordered">
					<tr align ="center" >
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('rif')); ?></b></td>
					</tr>
					<tr align="center">
						<td><?php echo CHtml::encode($data->rif); ?></td>
					</tr>				
				</table>
			</div>							
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">			
				<table class="table table-striped table-bordered">
					<tr align="center">
						<td>
							<b><?php echo CHtml::encode($data->getAttributeLabel('contacto')); ?></b>
						</td>
					</tr>	
					<tr align="center">
						<td>
							<?php echo CHtml::encode($data->contacto); ?>
						</td>
					</tr>						
				</table>
			</div>
			<div class="col-md-5">			
				<table class="table table-striped table-bordered">
					<tr align ="center" >
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?></b></td>
					</tr>
					<tr align="center">
						<td><?php echo CHtml::encode($data->correo); ?></td>
					</tr>				
				</table>
			</div>	
			<div class="col-md-3">			
				<table class="table table-striped table-bordered">
					<tr align ="center" >
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?></b></td>
					</tr>
					<tr align="center">
						<td><?php echo CHtml::encode($data->telefono); ?></td>
					</tr>				
				</table>
			</div>			
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">			
				<table class="table table-striped table-bordered">
					<tr align="center">
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?></b></td>
					</tr>
					<tr>
						<td align="justify"><?php echo CHtml::encode($data->direccion); ?></td>
					</tr>				
				</table>
			</div>
		</div>	
		<br>
	<?php } ?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	*/ ?>

</div>