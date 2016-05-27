<?php
/* @var $this SedeController */
/* @var $data Sede */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sede')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sede), array('view', 'id'=>$data->id_sede)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Empresa')); ?>:</b>
	<?php echo CHtml::encode($data->empresa->razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsable')); ?>:</b>
	<?php echo CHtml::encode($data->responsable); ?>
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