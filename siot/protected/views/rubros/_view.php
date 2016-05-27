<?php
/* @var $this RubrosController */
/* @var $data Rubros */
?>


	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rubro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rubro), array('view', 'id'=>$data->id_rubro)); ?>
	<br />
	-->
	
	<div class="view">
		<table class="table table-bordered">
			<tr class="warning" align="center">
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_rubro')); ?></b></td>	   
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::link(CHtml::encode($data->nombre_rubro), array('view', 'id'=>$data->id_rubro)); ?></td>
			</tr>	   
		</table>
	</div>
	<br>	