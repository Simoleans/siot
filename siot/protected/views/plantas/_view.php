<?php $usuario = Yii::app()->user->getId(); //echo $usuario?>
	
<?php 
	$empresa=Usuarios::model()->find('id_usuario=:user_planta', array('user_planta'=>$usuario));
	$empresa = $empresa->empresa_id;
	//echo $empresa;
	
	$empresa_id = CHtml::encode($data->empresa_id);				
	$empresa_id = Empresa::model()->find('id_empresa=:id_empresa', array('id_empresa'=>$empresa_id));
	$id_empresa = $empresa_id->id_empresa;			
	//echo $id_empresa;
	/*$sql = Yii::app()->db->createCommand("SELECT razon_social FROM empresa WHERE id_empresa='".$empresa."' lIMIT 1")->queryAll();
	foreach ($sql as $query) {
		$id = $query["razon_social"];
	}*/
?>
<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<h3><div class="flash-' . $key . '" style="color:red; text-align:center">' . $message . "</div></h3>\n";
                                
                    
                        
                }
        }
?>
		<?php if ($empresa <> 999) { ?>
			<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
			<?php echo CHtml::encode($data->empresa->razon_social); ?>
			<br />
		<?php } ?>

	<?php 
		if ($data->cap_ope==NULL) {$data->cap_ope="Vacio";}
		if ($data->cap_alm==NULL) {$data->cap_alm="Vacio";}  
		if ($data->cap_inst==NULL) {$data->cap_inst="Vacio";} 
		if ($data->alm_seco==NULL) {$data->alm_seco="Vacio";}
		if ($data->alm_frio==NULL) {$data->alm_frio="Vacio";}
		if ($data->alm_silo==NULL) {$data->alm_silo="Vacio";}
		if ($data->longitud==NULL) {$data->longitud="Vacio";}
		if ($data->latitud==NULL) {$data->latitud="Vacio";}   
		if ($data->descripcion==NULL) {$data->descripcion="Sin Descripcion";}
		if ($data->cant_lineas==0) {$data->estatus_lineas="NO";$data->activo="NO";}
		if ($data->cant_empleados==NULL) {$data->cant_empleados=0;}  
	?>
		<div class="view table-responsive">
			<table class="table table-bordered table-hover">
			   
				<tr class="warning" align="center">	   
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_planta')); ?></b></td>	
					<td><span><?php echo CHtml::link(CHtml::encode($data->nombre_planta), array('view', 'id'=>$data->id_planta), array('style'=>'color:#9D1F1F;')); ?></span></td>
				</tr>
				
				<tr class="success" align="center">
					<td width="30%"><b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?></b></td>				  	
					<td><?php echo CHtml::encode($data->estado->estado); ?></td>

				</tr>
				
				<tr class="warning" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?></b></td>
					<td><?php echo CHtml::encode($data->descripcion); ?></td>
				</tr>
				
				<tr class="success" align="center" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?></b></td>
					<td><?php echo CHtml::encode($data->tipo->nombre_tipo);?></td>
				</tr>

				<tr class="warning" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_inst')); ?></b></td>
					<td><?php echo CHtml::encode($data->cap_inst); ?></td>
				</tr>
				
				<tr class="success" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_ope')); ?></b></td>
					<td><?php echo CHtml::encode($data->cap_ope); ?></td>
				</tr>
				
				<tr class="warning" align="center">
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('cap_alm')); ?></b></td>
						<td><?php echo CHtml::encode($data->cap_alm); ?></td>
				</tr>

				<tr class="success" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_seco')); ?></b></td>
					<td><?php echo CHtml::encode($data->alm_seco); ?></td>
				</tr>
			
				<tr class="warning" align="center">
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_frio')); ?></b></td>
						<td><?php echo CHtml::encode($data->alm_frio); ?></td>
			    </tr>
			  
			    <tr class="success" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('alm_silo')); ?></b></td>
					<td><?php echo CHtml::encode($data->alm_silo); ?></td>
				</tr>
				
				<tr class="warning" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('cant_lineas')); ?></b></td>
					<td><?php echo CHtml::encode($data->cant_lineas); ?></td>
				</tr>
		 
			  	<tr class="success" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('estatus_lineas')); ?></b></td>
					<td>
						<h4>
							<span class="label label-<?php echo $data->estatus_lineas==1?"primary":"danger"; ?>">
								<?php echo $data->estatus_lineas==1?"SI":"NO"; ?>
							</span>
						</h4>	
					</td>
			    </tr>
			    
			    <tr class="warning" align="center">
					<td><b><?php echo CHtml::encode($data->getAttributeLabel('cant_empleados')); ?></b></td>
					<td><?php echo CHtml::encode($data->cant_empleados);  echo " Empleados" ?></td>
				</tr>
				
				<tr class="success" align="center">
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?></b></td>
						<td><?php echo CHtml::encode($data->longitud); ?></td>
				</tr>
				
				<tr class="warning" align="center">
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('latitud')); ?></b></td>
						<td><?php echo CHtml::encode($data->latitud); ?></td>
				</tr>

				<tr class="success" align="center">
						<td><b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?></b></td>
						<td>
							<h4>
								<span class="label label-<?php echo $data->activo==1?"primary":"danger"; ?>">
									<?php echo $data->activo==1?"SI":"NO"; ?>
								</span>
							</h4>	
						</td>
				</tr>

				
			 
			</table>
		</div>
	<br>
