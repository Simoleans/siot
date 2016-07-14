<?php
/* @var $this ProductosController */
/* @var $model Productos */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto=>array('view','id'=>$model->id_producto),
	'Modificar Producto',
);

$this->menu=array(
	array('label'=>'Listado de Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Ver Producto', 'url'=>array('view', 'id'=>$model->id_producto)),
	array('label'=>'Gestionar Productos', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Modificar Producto: <?php echo $model->nombre_producto; ?></b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>