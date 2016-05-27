<?php
$this->breadcrumbs=array(
	'Reportes'=>array('index'),
	'Gestionar Reportes',
);

$this->menu=array(
array('label'=>'Listado de Reportes','url'=>array('index')),
array('label'=>'Crear Reporte','url'=>array('create'), 'visible'=>Yii::app()->user->getState('roles') =='3'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('reportes-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Gestionar Reportes</span>

<div class="pd-inner">

	<p>
	Puede introducir opcionalmente un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
	</p>

	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
	<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

	<?php $this->widget('booster.widgets.TbGridView',array(
	'id'=>'reportes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			//'id_reporte',
			'usuario_id',
			'producto_id',
			'produccion',
			//'descripcion',
			'fecha_reporte',
	array(
	'class'=>'booster.widgets.TbButtonColumn',
	),
	),
	)); ?>
</div>