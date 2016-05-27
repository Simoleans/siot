<?php
/* @var $this MedidaController */
/* @var $data Medida */
?>

	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medida')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_medida), array('view', 'id'=>$data->id_medida)); ?>
	<br />
	-->
	
	<div class="view">
		<table class="table table-bordered">
			<tr class="warning" align="center">
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_medida')); ?></b></td>
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('abv_medida')); ?></b></td>
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::link(CHtml::encode($data->nombre_medida), array('view', 'id'=>$data->id_medida)); ?></td>
				<td><?php echo CHtml::encode($data->abv_medida); ?></td>
			</tr>	   
		</table>
	</div>
	<br>
