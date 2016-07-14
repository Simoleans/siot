<?php
/* @var $this MedidaController */
/* @var $model Medida */

$this->breadcrumbs=array(
	'Medidas'=>array('index'),
	$model->nombre_medida=>array('view','id'=>$model->id_medida),
	'Modificar Medida',
);

$this->menu=array(
	array('label'=>'Listado de Medidas', 'url'=>array('index')),
	array('label'=>'Crear Medida', 'url'=>array('create')),
	array('label'=>'Ver Medida', 'url'=>array('view', 'id'=>$model->id_medida)),
	array('label'=>'Gestionar Medidas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Modificar Medida: <?php echo $model->nombre_medida; ?></b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>