<?php
/* @var $this PresentacionController */
/* @var $data Presentacion */
?>

	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_presentacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_presentacion), array('view', 'id'=>$data->id_presentacion)); ?>
	<br />
	-->
	
	<div class="view">
		<table class="table table-bordered">
			   
			<tr class="warning" align="center">
				<td width="15%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_presentacion')); ?></b></td>	   
				<td width="15%"><b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?></b></td>	
			</tr>
			
			<tr align="center">
				<td rowspan="3"><?php echo CHtml::link(CHtml::encode($data->nombre_presentacion), array('view', 'id'=>$data->id_presentacion)); ?></td>
				<td class="success"><?php echo CHtml::encode($data->contenido); ?></td>	
			</tr>
			<tr class="warning" align="center">
				<td><b><?php echo CHtml::encode($data->getAttributeLabel('medida')); ?></b></td>
			</tr>
			<tr class="success" align="center">
				<td>
					<?php 
						$medida = CHtml::encode($data->medida->nombre_medida); 
						$abv = CHtml::encode($data->medida->abv_medida);
						echo $medida.' ('.$abv.')';
					?>			
				</td>
			</tr>		
			
		</table>
	</div>
	<br>	