<?php
/* @var $this MarcasController */
/* @var $model Marcas */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	'Crear Marca',
);

$this->menu=array(
	array('label'=>'Listado de Marcas', 'url'=>array('index')),
	array('label'=>'Gestionar Marcas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Crear Marca</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>