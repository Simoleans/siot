<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->nombre_perfil=>array('view','id'=>$model->id_perfil),
	'Modificar Perfil',
);

$this->menu=array(
	array('label'=>'Listado de Perfiles', 'url'=>array('index')),
	array('label'=>'Crear Perfil', 'url'=>array('create')),
	array('label'=>'Ver Perfil', 'url'=>array('view', 'id'=>$model->id_perfil)),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin')),
);
?>

<span class="ez">Modificar Perfil: <b><?php echo $model->nombre_perfil; ?></b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>