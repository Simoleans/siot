<?php
/* @var $this TipoPlantaController */
/* @var $model TipoPlanta */

$this->breadcrumbs=array(
	'Tipos de Plantas'=>array('index'),
	'Crear Tipo de Planta',
);

$this->menu=array(
	array('label'=>'Listado de Tipos de Plantas', 'url'=>array('index')),
	array('label'=>'Gestionar Tipos de Plantas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Crear Tipo de Planta</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>