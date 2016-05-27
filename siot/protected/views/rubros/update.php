<?php
/* @var $this RubrosController */
/* @var $model Rubros */

$this->breadcrumbs=array(
	'Rubros'=>array('index'),
	$model->nombre_rubro=>array('view','id'=>$model->id_rubro),
	'Modificar Rubro',
);

$this->menu=array(
	array('label'=>'Listado de Rubros', 'url'=>array('index')),
	array('label'=>'Crer Rubro', 'url'=>array('create')),
	array('label'=>'Ver Rubro', 'url'=>array('view', 'id'=>$model->id_rubro)),
	array('label'=>'Gestionar Rubros', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Modificar Rubro: <?php echo $model->nombre_rubro; ?></b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>