<?php
/* @var $this ProductosController */
/* @var $data Productos */
?>


	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_producto), array('view', 'id'=>$data->id_producto)); ?>
	<br />
	-->
	
	<div class="view">
		<table class="table table-bordered">
			   
			<tr class="warning" align="center">
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('producto')); ?></b></td>	   
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('rubro')); ?></b></td>	  
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::link(CHtml::encode($data->nombre_producto), array('view', 'id'=>$data->id_producto)); ?></td>
				<td><?php echo CHtml::encode($data->rubro->nombre_rubro); ?></td>
			</tr>
			<tr class="warning" align="center">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?></b></td>	
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('presentacion')); ?></b></td>	
			</tr>			
			<tr class="success" align="center">
				<td><?php echo CHtml::encode($data->marca->nombre_marca); ?></td>
				<td><?php echo CHtml::encode($data->presentacion->nombre_presentacion); ?></td>	  
			</tr>	   

		</table>
	</div>
	<br>	