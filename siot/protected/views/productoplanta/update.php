<?php
$this->breadcrumbs=array(
	'Producto Plantas'=>array('index'),
	$model->id_producto_planta=>array('view','id'=>$model->id_producto_planta),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ProductoPlanta','url'=>array('index')),
	array('label'=>'Create ProductoPlanta','url'=>array('create')),
	array('label'=>'View ProductoPlanta','url'=>array('view','id'=>$model->id_producto_planta)),
	array('label'=>'Manage ProductoPlanta','url'=>array('admin')),
	);
	?>

	<span class="ez"><b>Modificar Producto Asociado: <?php echo $model->id_producto_planta; ?></b></span>
	<div class="pd-inner">
		<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
	</div>