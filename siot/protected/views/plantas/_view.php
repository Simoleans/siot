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
		<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
		<?php echo CHtml::encode($data->empresa->razon_social); ?>
		<?php } ?>
		<?php 
			if ($data->longitud==NULL){$data->longitud="vacio";}
			if ($data->latitud==NULL){$data->latitud="vacio";}
			if ($data->descripcion==NULL){$data->descripcion="vacio";}
			if ($data->cap_inst==NULL){$data->cap_inst="vacio";}
			if ($data->cap_ope==NULL){$data->cap_ope="vacio";}
			if ($data->cap_alm==NULL){$data->cap_alm="vacio";}
			if ($data->alm_seco==NULL){$data->alm_seco="vacio";}
			if ($data->alm_frio==NULL){$data->alm_frio="vacio";}
			if ($data->alm_silo==NULL){$data->alm_silo="vacio";}
			if ($data->cant_empleados==NULL){$data->cant_empleados="0";}
		?>
		<div class="view">
		<table class="table table-bordered">
			<tr class="warning" align="center">	   
				<td width="70%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_planta')); ?></b></td>	
				<td width="30%"><b><?php echo CHtml::encode($data->getAttributeLabel('Ubicación')); ?></b></td>
			</tr>
			<tr class="success" align="center">
				<td>
					<?php echo CHtml::link(CHtml::encode($data->nombre_planta), array('view', 'id'=>$data->id_planta)); ?>		
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
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_ope')); ?>:</b></td>
			</tr>
			<tr class="success">
				<td><?php echo CHtml::encode($data->cap_inst); ?></td>
				<td><?php echo CHtml::encode($data->cap_ope); ?></td>
			</tr>
			<tr class="warning">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_alm')); ?>:</b></td>
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_seco')); ?>:</b></td>
			</tr>
			<tr class="success">
				<td><?php echo CHtml::encode($data->cap_alm); ?></td>
				<td><?php echo CHtml::encode($data->alm_seco); ?></td>
			</tr>
			<tr class="warning">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_frio')); ?>:</b></td>
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_silo')); ?>:</b></td>
		    </tr>
		    <tr class="success">
				<td><?php echo CHtml::encode($data->alm_frio); ?></td>
				<td><?php echo CHtml::encode($data->alm_silo); ?></td>
			</tr>
			<tr class="warning">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('cant_lineas')); ?>:</b></td>
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('estatus_lineas')); ?>:</b></td>
			</tr> 
		  	<tr class="success">
				<td><?php echo CHtml::encode($data->cant_lineas); ?></td>
				<td>
					<span class="label label-<?php echo $data->estatus_lineas==1?"primary":"danger"; ?>">
						<?php echo $data->estatus_lineas==1?"Si":"No"; ?>
					</span>
				</td>
		    </tr>
			<tr class="warning">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?>:</b></td>
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('latitud')); ?>:</b></td>
			</tr>
			 <tr class="success">
				<td><?php echo CHtml::encode($data->longitud); ?></td>
				<td><?php echo CHtml::encode($data->latitud); ?></td>
			</tr>
		    <tr class="warning">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('cant_empleados')); ?>:</b></td>
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b></td>
			</tr>
			<tr class="success">
				<td><?php echo CHtml::encode($data->cant_empleados);  echo " Empleados"; ?></td>
				<td>
					<span class="label label-<?php echo $data->activo==1?"primary":"danger"; ?>">
						<?php echo $data->activo==1?"Si":"No"; ?>
					</span>
				</td>
			</tr>
		 </table>
		</div>
	<br>
