<?php
/* @var $this GerenciaController */
/* @var $data Gerencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_gerencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_gerencia), array('view', 'id'=>$data->id_gerencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sede')); ?>:</b>
	<?php echo CHtml::encode($data->sede->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_gerencia')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_gerencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gerente')); ?>:</b>
	<?php echo CHtml::encode($data->gerente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ubicacion')); ?>:</b>
	<?php echo CHtml::encode($data->ubicacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />


</div>