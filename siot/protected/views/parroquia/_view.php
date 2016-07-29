<?php
/* @var $this ParroquiaController */
/* @var $data Parroquia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parroquia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_parroquia), array('view', 'id'=>$data->id_parroquia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio_id')); ?>:</b>
	<?php echo CHtml::encode($data->municipio_id); ?>
	<br />


</div>