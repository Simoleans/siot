<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Gestionar Usuarios',
);

$this->menu=array(
array('label'=>'Listado de Usuarios','url'=>array('index')),
array('label'=>'Crear Usuario','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('usuarios-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Gestionar Usuarios</span>

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
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			'cedula',
			'nombre',
			'apellido',
			'usuario',			
			array ('name'=>'perfil_id','value'=>'$data->perfil->nombre_perfil','type'=>'text',),
			array ('name'=>'empresa_id','value'=>'$data->empresa->razon_social','type'=>'text',),
			/*array ('name'=>'planta_id','value'=>'$data->plantas->nombre_planta','type'=>'text',),						
			
			'id_usuario',
			'sede_id',
			'gerencia_id',
			'fecha_nac',
			'contraseña',
			'correo',
			'telefono',
			'activo',
			'fecha_registro',
			*/
	array(
	'class'=>'booster.widgets.TbButtonColumn',
	),
	),
	)); ?>
</div>
