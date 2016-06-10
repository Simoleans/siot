

	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario),array('view','id'=>$data->id_usuario)); ?>
	<br />
	-->
	
	<div class="view">
		<table class="table table-bordered">
			<tr class="warning" align="center">
				<td width="25%"><b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?></b></td>
				<td width="25%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?></b></td>	
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::link(CHtml::encode($data->cedula),array('view','id'=>$data->id_usuario)); ?></td>
				<td><?php echo CHtml::encode($data->nombre);?> <?php echo CHtml::encode($data->apellido); ?></td>
			</tr>
			<tr class="warning" align="center">
				<td width="25%"><b><?php echo CHtml::encode($data->getAttributeLabel('perfil_id')); ?></b></td>
				<td width="25%"><b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?></b></td>	
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::encode($data->perfil->nombre_perfil); ?></td>
				<td><?php echo CHtml::encode($data->empresa->razon_social); ?></td>
				
			</tr>			
		</table>
	</div>
	<br>	

	<?php
	/*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('planta_id')); ?>:</b>
	<?php echo CHtml::encode($data->plantas->nombre_planta); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('sede_id')); ?>:</b>
	<?php echo CHtml::encode($data->sede_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gerencia_id')); ?>:</b>
	<?php echo CHtml::encode($data->gerencia_id); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nac')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nac); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('contraseña')); ?>:</b>
	<?php echo CHtml::encode($data->contraseña); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />
	*/
	?>