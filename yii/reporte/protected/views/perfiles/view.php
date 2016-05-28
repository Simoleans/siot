<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->nombre_perfil,
);

$this->menu=array(
	array('label'=>'Listado de Perfiles', 'url'=>array('index')),
	array('label'=>'Crear Perfil', 'url'=>array('create')),
	array('label'=>'Modificar Perfil', 'url'=>array('update', 'id'=>$model->id_perfil)),
	array('label'=>'Eliminar Perfil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_perfil),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin')),
);
?>

<span class="ez">Perfil: <b><?php echo $model->nombre_perfil; ?></b></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_perfil',*/
			'nombre_perfil',
			/*'activo',*/
		),
	)); ?>
</div>
