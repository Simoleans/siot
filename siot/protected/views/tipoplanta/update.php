<?php
/* @var $this TipoPlantaController */
/* @var $model TipoPlanta */

$this->breadcrumbs=array(
	'Tipo de Plantas'=>array('index'),
	$model->nombre_tipo=>array('view','id'=>$model->id_tipo),
	'Modificar Tipo de Planta',
);

$this->menu=array(
	array('label'=>'Listado de Tipos de Plantas', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Planta', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Planta', 'url'=>array('view', 'id'=>$model->id_tipo)),
	array('label'=>'Gestionar Tipos de Plantas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Modificar Tipo de Planta: <?php echo $model->nombre_tipo; ?></b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>