<?php
/* @var $this MedidaController */
/* @var $model Medida */

$this->breadcrumbs=array(
	'Medidas'=>array('index'),
	'Crear Medida',
);

$this->menu=array(
	array('label'=>'Listado de Medidas', 'url'=>array('index')),
	array('label'=>'Gestionar Medidas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Crear Medida</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>