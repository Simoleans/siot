<?php
/* @var $this SedeController */
/* @var $model Sede */

$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	$model->id_sede,
);

$this->menu=array(
	array('label'=>'List Sede', 'url'=>array('index')),
	array('label'=>'Create Sede', 'url'=>array('create')),
	array('label'=>'Update Sede', 'url'=>array('update', 'id'=>$model->id_sede)),
	array('label'=>'Delete Sede', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sede),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sede', 'url'=>array('admin')),
);
?>

<h1>View Sede #<?php echo $model->id_sede; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sede',
		'empresa.razon_social',
		'nombre',
		'responsable',
		'ubicacion',
		'activo',
		'fecha_registro',
	),
)); ?>
