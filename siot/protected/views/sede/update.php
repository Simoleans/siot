<?php
/* @var $this SedeController */
/* @var $model Sede */

$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	$model->id_sede=>array('view','id'=>$model->id_sede),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sede', 'url'=>array('index')),
	array('label'=>'Create Sede', 'url'=>array('create')),
	array('label'=>'View Sede', 'url'=>array('view', 'id'=>$model->id_sede)),
	array('label'=>'Manage Sede', 'url'=>array('admin')),
);
?>

<h1>Update Sede <?php echo $model->id_sede; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>