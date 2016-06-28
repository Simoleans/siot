	<?php 
		$usuario = Yii::app()->user->getId(); //echo $usuario; 			
		$empresa=Usuarios::model()->find('id_usuario=:user_planta', array('user_planta'=>$usuario));
		$empresa = $empresa->empresa_id;
		//echo $empresa;
	?>
		
	<?php $user_reporte = CHtml::encode($data->usuario_id);	//echo $user_reporte ?>
	<?php $empresa_reporte = CHtml::encode($data->usuario->empresa_id);	//echo 'empresa el q reporto:'.$empresa_reporte ?>
	
	<?php 
		if (Yii::app()->user->getState('roles') == '2') 
			{ 
			$this->layout='//layouts/column1';
			}
	?>
	
	<?php if (($usuario == $user_reporte) or ($empresa == 999) or ($empresa == $empresa_reporte))  { ?>

		<div>
			<hr>
			<div class="row">
				<div class="col-md-8">			
					<table class="table table-striped table-bordered">
						<tr align="center">
							<td>
								<?php 
									$id_empresa = CHtml::encode($data->usuario->empresa_id); 
									$id_empresa = Empresa::model()->find('id_empresa=:id_empresa', array('id_empresa'=>$id_empresa));
									$nombre_empresa = $id_empresa->razon_social;
									echo $nombre_empresa;
								?>
								
								<br><br>
								<?php echo CHtml::encode($data->getAttributeLabel('planta')); ?> :
								<?php
									$id_planta = CHtml::encode($data->usuario->planta_id); 
									$id_planta = Plantas::model()->find('id_planta=:id_planta', array('id_planta'=>$id_planta));
									$nombre_planta = $id_planta->nombre_planta;		
									echo $nombre_planta;
								?>									
							</td>
						</tr>				
					</table>
				</div>
				<div class="col-md-2">			
					<table class="table table-striped table-bordered">
						<tr align ="center" >
							<td width="45%"><b><?php echo CHtml::encode($data->getAttributeLabel('N° Reporte')); ?></b></td>
						</tr>
						<tr align="center">
							<td><?php echo '000000'.CHtml::link(CHtml::encode($data->id_reporte),array('view','id'=>$data->id_reporte)); ?></td>
						</tr>				
					</table>
				</div>				
				<div class="col-md-2">			
					<table class="table table-striped table-bordered">
						<tr align ="center" >
							<td width="45%"><b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reporte')); ?></b></td>
						</tr>
						<tr align="center">
							<td><?php echo CHtml::encode($data->fecha_reporte); ?></td>
						</tr>				
					</table>
				</div>				
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">			
					<table class="table table-striped table-bordered">
						<tr align="center">
							<td><b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?></b></td>	
						</tr>
						<tr align="center">
							<td>
								<?php 
									$nombre = CHtml::encode($data->usuario->nombre); 
									$apellido = CHtml::encode($data->usuario->apellido); 
									echo $nombre.' '.$apellido;
								?>								
							</td>	
						</tr>							
					</table>
				</div>			
				<div class="col-md-4">			
					<table class="table table-striped table-bordered">
						<tr align="center">
							<td><b><?php echo CHtml::encode($data->getAttributeLabel('producto_id')); ?></b></td>
						</tr>
						<tr align="center">
							<td>
								<?php 
									$id_producto = CHtml::encode($data->producto_id);
									$id_producto = Productos::model()->find('id_producto=:id_producto', array('id_producto'=>$id_producto));
									$nombre_producto = $id_producto->nombre_producto;		
									echo $nombre_producto;						
								?>
							</td>
						</tr>
					</table>
				</div>				
				<div class="col-md-4">			
					<table class="table table-striped table-bordered">
						<tr align="center">
							<td><b><?php echo CHtml::encode($data->getAttributeLabel('produccion')); ?> EN KILOGRAMOS</b></td>	
						</tr>
						<tr align="center">
							<td><b><span class="required"><?php echo CHtml::encode($data->produccion); ?> KG</span></b></td>
						</tr>							
					</table>
				</div>				
			</div>			
			
			<br>
			<div class="row">
				<div class="col-md-12">			
					<table class="table table-striped table-bordered">
						<tr align="center">
							<td><b><?php echo CHtml::encode($data->getAttributeLabel('Observación')); ?></b></td>
						</tr>
						<tr>
							<td align="justify"><?php echo CHtml::encode($data->descripcion); ?></td>
						</tr>				
					</table>
				</div>
			</div>
		
		</div>
		<br>
	<?php } ?>

