<?php
/* @var $this SedeController */
/* @var $model Sede */

$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sede', 'url'=>array('index')),
	array('label'=>'Manage Sede', 'url'=>array('admin')),
);
?>

<h1>Create Sede</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>