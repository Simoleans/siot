<?php
/* @var $this GerenciaController */
/* @var $model Gerencia */

$this->breadcrumbs=array(
	'Gerencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gerencia', 'url'=>array('index')),
	array('label'=>'Manage Gerencia', 'url'=>array('admin')),
);
?>

<h1>Create Gerencia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>