<?php
/* @var $this ParroquiaController */
/* @var $model Parroquia */

$this->breadcrumbs=array(
	'Parroquias'=>array('index'),
	$model->id_parroquia,
);

$this->menu=array(
	array('label'=>'List Parroquia', 'url'=>array('index')),
	array('label'=>'Create Parroquia', 'url'=>array('create')),
	array('label'=>'Update Parroquia', 'url'=>array('update', 'id'=>$model->id_parroquia)),
	array('label'=>'Delete Parroquia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_parroquia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parroquia', 'url'=>array('admin')),
);
?>

<h1>View Parroquia #<?php echo $model->id_parroquia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_parroquia',
		'nombre',
		'municipio_id',
	),
)); ?>
