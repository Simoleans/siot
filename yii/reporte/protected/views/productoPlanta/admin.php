<?php
$this->breadcrumbs=array(
	'Producto Plantas'=>array('index'),
	'Gestionar Productos Asociados',
);

$this->menu=array(
array('label'=>'Listado de Productos Asociados','url'=>array('index')),
array('label'=>'Asociar Producto a Planta','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('producto-planta-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez"><b>Gestionar Productos Asociados</b></span>

<div class="pd-inner">

	<p>
	Puede introducir opcionalmente un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
	</p>

	<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
	<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

	<?php $this->widget('booster.widgets.TbGridView',array(
	'id'=>'producto-planta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			'id_producto_planta',
			'producto_id',
			'planta_id',
			'activo',
	array(
	'class'=>'booster.widgets.TbButtonColumn',
	),
	),
	)); ?>
</div>
