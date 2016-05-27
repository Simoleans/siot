<?php
/* @var $this GerenciaController */
/* @var $model Gerencia */

$this->breadcrumbs=array(
	'Gerencias'=>array('index'),
	$model->id_gerencia=>array('view','id'=>$model->id_gerencia),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gerencia', 'url'=>array('index')),
	array('label'=>'Create Gerencia', 'url'=>array('create')),
	array('label'=>'View Gerencia', 'url'=>array('view', 'id'=>$model->id_gerencia)),
	array('label'=>'Manage Gerencia', 'url'=>array('admin')),
);
?>

<h1>Update Gerencia <?php echo $model->id_gerencia; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>