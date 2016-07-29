<?php
/* @var $this PlantasController */
/* @var $model Plantas */

$this->breadcrumbs=array(
	'Plantas'=>array('index'),
	'Gestionar Plantas',
);

$this->menu=array(
	array('label'=>'Listado de Plantas', 'url'=>array('index')),
	array('label'=>'Crear Planta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#plantas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<span class="ez">Gestionar Plantas</span>

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
		'id'=>'plantas-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			array('name'=>'estado_id','value'=>'$data->estado->estado'),
			/*'id_planta',*/
			'nombre_planta',
			//array ('name'=>'empresa_id','value'=>'$data->empresa->razon_social','type'=>'text',),
			array ('name'=>'tipo_id','value'=>'$data->tipo->nombre_tipo','type'=>'text',),
			//array('name'=>'municipio_id','value'=>'$data->municipio->municipio'),
			//array('name'=>'parroquia_id','value'=>'$data->parroquia->parroquia'),
			/*
			'descripcion',
			'cap_inst',
			'cap_ope',
			'cap_alm',
			'alm_seco',
			'alm_frio',
			'alm_silo',
			'cant_lineas',
			'estatus_lineas',
			'cant_empleados',
			'longitud',
			'latitud',
			'activo',
			*/
			array(
				'class'=>'booster.widgets.TbButtonColumn',
			),
		),
	)); ?>
</div>
