<?php
/* @var $this ProductosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Productos',
);

$this->menu=array(
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Gestionar Productos', 'url'=>array('admin')),
);
?>

<span class="ez">Listado de Productos</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
