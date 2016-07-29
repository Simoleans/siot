<?php
/* @var $this RubrosController */
/* @var $model Rubros */

$this->breadcrumbs=array(
	'Rubros'=>array('index'),
	$model->nombre_rubro,
);

$this->menu=array(
	array('label'=>'Listado de Rubros', 'url'=>array('index')),
	array('label'=>'Crear Rubro', 'url'=>array('create')),
	array('label'=>'Modificar Rubro', 'url'=>array('update', 'id'=>$model->id_rubro)),
	array('label'=>'Eliminar Rubro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rubro),'confirm'=>'Desea Elimar este Rubro ?')),
	array('label'=>'Gestionar Rubros', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Rubro: <?php echo $model->nombre_rubro; ?></b></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_rubro',*/
			'nombre_rubro',
		),
	)); ?>
</div>