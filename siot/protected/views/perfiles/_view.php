<?php
/* @var $this PerfilesController */
/* @var $data Perfiles */
?>


	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_perfil')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_perfil), array('view', 'id'=>$data->id_perfil)); ?>
	<br />
	-->
	<?php $perfil = CHtml::encode($data->id_perfil);?> 
		
	<?php if ($perfil != '5') { ?>
	<div class="view">
		<table class="table table-bordered">
			<tr class="warning" align="center">
				<td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_perfil')); ?></b></td>	   
			</tr>
			<tr class="success" align="center">
				<td><?php echo CHtml::link(CHtml::encode($data->nombre_perfil), array('view', 'id'=>$data->id_perfil)); ?></td>
			</tr>	   
		</table>
	</div>
	<br>	
<?php }?>
	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />
	-->