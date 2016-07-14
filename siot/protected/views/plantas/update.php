<?php
/* @var $this PlantasController */
/* @var $model Plantas */

$this->breadcrumbs=array(
	'Plantas'=>array('index'),
	$model->nombre_planta=>array('view','id'=>$model->id_planta),
	'Modificar Planta',
);

$this->menu=array(
	array('label'=>'Listado de Plantas', 'url'=>array('index')),
	array('label'=>'Crear Planta', 'url'=>array('create')),
	array('label'=>'Ver Planta', 'url'=>array('view', 'id'=>$model->id_planta)),
	array('label'=>'Gestionar Plantas', 'url'=>array('admin')),
);
?>

<span class="ez">Modificar Planta: <?php echo $model->nombre_planta; ?></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>