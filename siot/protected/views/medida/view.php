<?php
/* @var $this MedidaController */
/* @var $model Medida */

$this->breadcrumbs=array(
	'Medidas'=>array('index'),
	$model->nombre_medida,
);

$this->menu=array(
	array('label'=>'Listado de Medidas', 'url'=>array('index')),
	array('label'=>'Crear Medida', 'url'=>array('create')),
	array('label'=>'Modificar Medida', 'url'=>array('update', 'id'=>$model->id_medida)),
	array('label'=>'Eliminar Medida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_medida),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Medidas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Medida: <?php echo $model->nombre_medida; ?></b></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_medida',*/
			'nombre_medida',
			'abv_medida',
		),
	)); ?>
</div>
