<?php
/* @var $this RubrosController */
/* @var $model Rubros */

$this->breadcrumbs=array(
	'Rubros'=>array('index'),
	'Crear Rubro',
);

$this->menu=array(
	array('label'=>'Listado de Rubros', 'url'=>array('index')),
	array('label'=>'Gestionar Rubros', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Crear Rubro</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>