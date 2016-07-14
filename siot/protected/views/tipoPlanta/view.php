<?php
/* @var $this TipoPlantaController */
/* @var $model TipoPlanta */

$this->breadcrumbs=array(
	'Tipo de Plantas'=>array('index'),
	$model->nombre_tipo,
);

$this->menu=array(
	array('label'=>'Listado de Tipos de Plantas', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Planta', 'url'=>array('create')),
	array('label'=>'Modificar Tipo de Planta', 'url'=>array('update', 'id'=>$model->id_tipo)),
	array('label'=>'Eliminar Tipo de Planta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Tipos de Plantas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Tipo de Planta: <?php echo $model->nombre_tipo; ?></b></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_tipo',*/
			'nombre_tipo',
		),
	)); ?>
</div>
