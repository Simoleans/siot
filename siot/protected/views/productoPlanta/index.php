<?php
$this->breadcrumbs=array(
	'Producto Asociados',
);

$this->menu=array(
array('label'=>'Asociar Producto a Planta','url'=>array('create')),
array('label'=>'Gestionar Productos Asociados','url'=>array('admin')),
);
?>

<span class="ez">Productos Asociados</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>