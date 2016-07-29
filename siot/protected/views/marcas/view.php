<?php
/* @var $this MarcasController */
/* @var $model Marcas */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->nombre_marca,
);

$this->menu=array(
	array('label'=>'Listado de Marcas', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Modificar Marca', 'url'=>array('update', 'id'=>$model->id_marca)),
	array('label'=>'Eliminar Marca', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_marca),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Marcas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Rubro: <?php echo $model->nombre_marca; ?></b></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_marca',*/
			'nombre_marca',
		),
	)); ?>
</div>