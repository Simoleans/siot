<?php
$this->breadcrumbs=array(
	'Productos Asociados'=>array('index'),
	$model->id_producto_planta,
);

$this->menu=array(
array('label'=>'Listado de Productos Asociados','url'=>array('index')),
array('label'=>'Asociar Productoa Planta','url'=>array('create')),
array('label'=>'Modificar Producto Asociado','url'=>array('update','id'=>$model->id_producto_planta)),
array('label'=>'Eliminar Producto Asociado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_producto_planta),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Gestionar Productos Asociados','url'=>array('admin')),
);
?>


<span class="ez">Producto Asociado: <?php echo $model->id_producto_planta; ?></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			//'id_producto_planta',
			'producto_id',
			'planta_id',
			'activo',
	),
	)); ?>
</div>
