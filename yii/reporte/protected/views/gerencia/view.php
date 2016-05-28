<?php
/* @var $this GerenciaController */
/* @var $model Gerencia */

$this->breadcrumbs=array(
	'Gerencias'=>array('index'),
	$model->id_gerencia,
);

$this->menu=array(
	array('label'=>'List Gerencia', 'url'=>array('index')),
	array('label'=>'Create Gerencia', 'url'=>array('create')),
	array('label'=>'Update Gerencia', 'url'=>array('update', 'id'=>$model->id_gerencia)),
	array('label'=>'Delete Gerencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_gerencia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gerencia', 'url'=>array('admin')),
);
?>

<h1>View Gerencia #<?php echo $model->id_gerencia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_gerencia',
		'sede.nombre',
		'nombre_gerencia',
		'gerente',
		'ubicacion',
		'activo',
		'fecha_registro',
	),
)); ?>
