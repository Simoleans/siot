<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */

$this->breadcrumbs=array(
	'Presentaciones'=>array('index'),
	$model->nombre_presentacion=>array('view','id'=>$model->id_presentacion),
	'Modificar Presentación',
);

$this->menu=array(
	array('label'=>'Listado de Presentaciones', 'url'=>array('index')),
	array('label'=>'Crear Presentación', 'url'=>array('create')),
	array('label'=>'Ver Presentación', 'url'=>array('view', 'id'=>$model->id_presentacion)),
	array('label'=>'Gestionar Presentaciones', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Modificar Presentación: <?php echo $model->nombre_presentacion; ?></b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>