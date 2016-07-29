<?php
/* @var $this TipoPlantaController */
/* @var $model TipoPlanta */

$this->breadcrumbs=array(
	'Tipo Plantas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TipoPlanta', 'url'=>array('index')),
	array('label'=>'Create TipoPlanta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-planta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<span class="ez"><b>Gestionar Tipos de Planta</b></span>

<div class="pd-inner">

	<p>
	Puede introducir opcionalmente un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
	</p>

	<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

	<?php $this->widget('booster.widgets.TbGridView', array(
		'id'=>'tipo-planta-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			/*'id_tipo',*/
			'nombre_tipo',
			array(
				'class'=>'booster.widgets.TbButtonColumn',
			),
		),
	)); ?>
</div>
