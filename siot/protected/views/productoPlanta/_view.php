<?php $usuario = Yii::app()->user->getId(); //echo $usuario?>
	
<?php 
	$empresa=Usuarios::model()->find('id_usuario=:user_planta', array('user_planta'=>$usuario));
	$empresa = $empresa->empresa_id;
	//echo $empresa;
	
	$planta_id = CHtml::encode($data->planta_id);				
	$planta_id = Plantas::model()->find('id_planta=:id_planta', array('id_planta'=>$planta_id));
	$id_planta = $planta_id->empresa_id;			
	//echo $id_planta;
?>

	<?php if (($empresa == $id_planta) or ($empresa == 999)) { ?>		
	<div class="view">
		<table class="table table-bordered">
		   
			<tr class="warning" align="center">
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('planta_id')); ?></b></td>	   
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('Producto Asociado')); ?></b></td>	  
			</tr>
			<tr class="success" align="center">
			  <td>
				<?php 	
					echo $planta_id->nombre_planta;
				?>
			  </td>
			  
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
	<br>
	<?php } ?>