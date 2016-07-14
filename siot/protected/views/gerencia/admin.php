<?php
/* @var $this GerenciaController */
/* @var $model Gerencia */

$this->breadcrumbs=array(
	'Gerencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gerencia', 'url'=>array('index')),
	array('label'=>'Create Gerencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gerencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gerencias</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gerencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_gerencia',
		array ('name'=>'sede_id','value'=>'$data->sede->nombre','type'=>'text',),
		'nombre_gerencia',
		'gerente',
		'ubicacion',
		'activo',
		/*
		'fecha_registro',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
