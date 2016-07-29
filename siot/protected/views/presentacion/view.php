<?php
/* @var $this PresentacionController */
/* @var $model Presentacion */

$this->breadcrumbs=array(
	'Presentaciones'=>array('index'),
	$model->nombre_presentacion,
);

$this->menu=array(
	array('label'=>'Listado de Presentaciones', 'url'=>array('index')),
	array('label'=>'Crear Presentación', 'url'=>array('create')),
	array('label'=>'Modificar Presentación', 'url'=>array('update', 'id'=>$model->id_presentacion)),
	array('label'=>'Eliminar Presentación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_presentacion),'confirm'=>'Desea Elimar esta Presentación ?')),
	array('label'=>'Gestionar Presentaciones', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Presentación: <?php echo $model->nombre_presentacion; ?></b></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_presentacion',*/
			'nombre_presentacion',
			'contenido',
			'medida.abv_medida',
		),
	)); ?>
</div>
