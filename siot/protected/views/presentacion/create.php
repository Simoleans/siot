<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */

$this->breadcrumbs=array(
	'Presentaciones'=>array('index'),
	'Creae Presentación',
);

$this->menu=array(
	array('label'=>'Listado de Presentaciones', 'url'=>array('index')),
	array('label'=>'Gestionar Presentaciones', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Crear Presentacion</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>