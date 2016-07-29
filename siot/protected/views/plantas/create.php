<?php
/* @var $this PlantasController */
/* @var $model Plantas */

$this->breadcrumbs=array(
	'Plantas'=>array('index'),
	'Crear Planta',
);

$this->menu=array(
	array('label'=>'Listado de Plantas', 'url'=>array('index')),
	array('label'=>'Gestionar Plantas', 'url'=>array('admin')),
);
?>



<span class="ez"><b>Crear Planta</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>