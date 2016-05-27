<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Modificar Usuario',
);

	$this->menu=array(
	array('label'=>'Listado de Usuarios','url'=>array('index')),
	array('label'=>'Crear Usuario','url'=>array('create')),
	array('label'=>'Ver Usuario','url'=>array('view','id'=>$model->id_usuario)),
	array('label'=>'Gestionar Usuarios','url'=>array('admin')),
	);
	?>

<span class="ez">Modificar Usuario: <b><?php echo $model->nombre; ?> <?php echo $model->apellido; ?></b></span>
<div class="pd-inner">
	<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>