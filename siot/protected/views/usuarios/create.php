<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear Usuario',
);

$this->menu=array(
array('label'=>'Listado de Usuarios','url'=>array('index')),
array('label'=>'Gestionar Usuarios','url'=>array('admin')),
);
?>

<span class="ez">Crear Usuario</span>
<div class="pd-inner">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>