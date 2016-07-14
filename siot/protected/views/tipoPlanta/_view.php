<?php
/* @var $this TipoPlantaController */
/* @var $data TipoPlanta */
?>


	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo), array('view', 'id'=>$data->id_tipo)); ?>
	<br />
	-->
	<div class="view">
		<table class="table table-bordered">
			<tr class="warning" align="center">
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tipo')); ?>:</b></td>	   
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::link(CHtml::encode($data->nombre_tipo), array('view', 'id'=>$data->id_tipo)); ?></td>
			</tr>	   
		</table>
	</div>
	<br>