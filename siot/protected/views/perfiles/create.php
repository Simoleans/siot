<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	'Crear Perfil',
);

$this->menu=array(
	array('label'=>'Listado de Perfiles', 'url'=>array('index')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin')),
);
?>

<span class="ez">Crear Perfil</span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>