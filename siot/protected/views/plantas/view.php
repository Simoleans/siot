<?php
/* @var $this PlantasController */
/* @var $model Plantas */

$this->breadcrumbs=array(
	'Plantas'=>array('index'),
	$model->nombre_planta,
);

$this->menu=array(
	array('label'=>'Listado de Plantas', 'url'=>array('index')),
	array('label'=>'Crear Planta', 'url'=>array('create')),
	array('label'=>'Modificar Planta', 'url'=>array('update', 'id'=>$model->id_planta)),
	array('label'=>'Eliminar Planta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_planta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Plantas', 'url'=>array('admin')),
);
?>

<span class="ez">Planta: <?php echo $model->nombre_planta; ?></span>
<div class="pd-inner">

	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'htmlOptions'=>array('class'=>'table table-striped responsive-table'),
		'attributes'=>array(
			/*'id_planta',
			'nombre_planta',*/
			'empresa.razon_social',
			'tipo.nombre_tipo',
			'estado.estado',
			'municipio.municipio',
			'parroquia.parroquia',
			/*
			'descripcion',
			'cap_inst',
			'cap_ope',
			'cap_alm',
			'alm_seco',
			'alm_frio',
			'alm_silo',
			'cant_lineas',
			'estatus_lineas',
			'cant_empleados',
			'longitud',
			'latitud',
			'activo',
			*/
		),
	)); ?>
</div>
