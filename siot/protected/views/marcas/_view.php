<?php
/* @var $this MarcasController */
/* @var $data Marcas */
?>

	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_marca')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_marca), array('view', 'id'=>$data->id_marca)); ?>
	<br />
	-->

	<div class="view">
		<table class="table table-bordered">
			<tr class="warning" align="center">
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_marca')); ?></b></td>	   
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::link(CHtml::encode($data->nombre_marca), array('view', 'id'=>$data->id_marca)); ?></td>
			</tr>	   
		</table>
	</div>
	<br>	
