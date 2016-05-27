<?php
/* @var $this ProductosController */
/* @var $model Productos */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->nombre_producto,
);

$this->menu=array(
	array('label'=>'Listado de Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Modificar Producto', 'url'=>array('update', 'id'=>$model->id_producto)),
	array('label'=>'Eliminar Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_producto),'confirm'=>'Desea Elimar este Producto ?')),
	array('label'=>'Gestionar Productos', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Producto: <?php echo $model->nombre_producto; ?></b></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_producto',*/
			'nombre_producto',
			'rubro.nombre_rubro',
			'marca.nombre_marca',
			'presentacion.nombre_presentacion',
		),
	)); ?>
</div>