<?php $usuario = Yii::app()->user->getId(); //echo $usuario?>
	
<?php 
	$empresa=Usuarios::model()->find('id_usuario=:user_planta', array('user_planta'=>$usuario));
	$empresa = $empresa->empresa_id;
	//echo $empresa;
	
	$empresa_id = CHtml::encode($data->empresa_id);				
	$empresa_id = Empresa::model()->find('id_empresa=:id_empresa', array('id_empresa'=>$empresa_id));
	$id_empresa = $empresa_id->id_empresa;			
	//echo $id_empresa;
?>

		<?php if ($empresa == 999) { ?>
		<b>
		<?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
		<?php echo CHtml::encode($data->empresa->razon_social); ?>
		<br />
		<?php } ?>
		<div class="view">
		<table class="table table-bordered">
		   
			<tr class="warning" align="center">	   
				<td width="70%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_planta')); ?></b></td>	
				<td width="30%"><b><?php echo CHtml::encode($data->getAttributeLabel('Ubicación')); ?></b></td>				  
			</tr>
			<tr class="success" align="center">
				<td>
					<?php echo CHtml::link(CHtml::encode($data->nombre_planta), array('view', 'id'=>$data->id_planta)); ?><br>
					<?php //echo '( '.CHtml::encode($data->tipo->nombre_tipo).' )';?>		
				</td>
			  
				<td>
					<?php echo CHtml::encode($data->estado->estado); ?>
				</td>			    
			</tr>
			
			<tr class="warning" align="center">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?></b></td>
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?></b></td>
				
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::encode($data->descripcion); ?></td>
				<td><?php echo CHtml::encode($data->tipo->nombre_tipo);?></td>
			</tr>


			

		<tr class="warning">
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_inst')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->cap_inst); ?></td>
		</tr>
		<tr class="success">
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_ope')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->cap_ope); ?></td>
		</tr>
		
		<tr class="warning">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_alm')); ?>:</b></td>
				<td><?php echo CHtml::encode($data->cap_alm); ?></td>
		</tr>

		<tr class="success">
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_seco')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->alm_seco); ?></td>
		</tr>
	
	<tr class="warning">
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_frio')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->alm_frio); ?></td>
    </tr>
  
    <tr class="success">
		<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_silo')); ?>:</b></td>
		<td><?php echo CHtml::encode($data->alm_silo); ?></td>
	</tr>
		<tr class="warning">
			<td><b><?php echo CHtml::encode($data->getAttributeLabel('cant_lineas')); ?>:</b></td>
			<td><?php echo CHtml::encode($data->cant_lineas); ?></td>
		</tr>
 

  	<tr class="success">
		<td><b><?php echo CHtml::encode($data->getAttributeLabel('estatus_lineas')); ?>:</b></td>
		<td><?php echo CHtml::encode($data->estatus_lineas); ?></td>
    </tr>
    <tr class="warning">
		<td><b><?php echo CHtml::encode($data->getAttributeLabel('cant_empleados')); ?>:</b></td>
		<td><?php echo CHtml::encode($data->cant_empleados);  echo " Empleados" ?></td>
	</tr>
<tr class="success">
		<td><b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?>:</b></td>
		<td><?php echo CHtml::encode($data->longitud); ?></td>
</tr>
  <tr class="warning">
		<td><b><?php echo CHtml::encode($data->getAttributeLabel('latitud')); ?>:</b></td>
		<td><?php echo CHtml::encode($data->latitud); ?></td>
</tr>

<tr class="success">
		<td><b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b></td>
		<td><?php echo CHtml::encode($data->activo); ?></td>
</tr>
		 </table>
		</div>
	<br>
