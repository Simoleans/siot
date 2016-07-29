<?php
/* @var $this ProductosController */
/* @var $model Productos */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Crear Producto',
);

$this->menu=array(
	array('label'=>'Listado de Productos', 'url'=>array('index')),
	array('label'=>'Gestionar Productos', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Crear Producto</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>