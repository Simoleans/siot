<?php
$this->breadcrumbs=array(
	'Reportes'=>array('index'),
	$model->id_reporte,
);

$this->menu=array(
array('label'=>'Listado de Reportes','url'=>array('index')),
array('label'=>'Crear Reporte','url'=>array('create'),'visible'=>Yii::app()->user->getState('roles') =='3'),
array('label'=>'Modificar Reportes','url'=>array('update','id'=>$model->id_reporte), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Eliminar Reportes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_reporte),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Gestionar Reportes','url'=>array('admin'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
);


?>

<span class="ez">Reporte N°: <?php echo $model->id_reporte; ?></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			//'id_reporte',
			'fecha_reporte',
			'producto.nombre_producto',			
			'usuario.usuario',

			'produccion' ,
			'descripcion',

	),
	)); ?>
</div>
