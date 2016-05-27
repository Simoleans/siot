<?php
$this->breadcrumbs=array(
	'Produccion Por Rubros'=>array('indexrub'),
);
?>
<?php 
		if (Yii::app()->user->getState('roles') == '2') 
			{ 
			$this->layout='//layouts/column1';
			}
?>
<span class="ez">Listado de Rubros
	<div align="center" class="pull-right">
        <?php echo CHtml::link(CHtml::encode('Ver Grafico'), array('viewrub', 'id'=>1), array('class' => 'btn btn-success')); ?>
    </div>
</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_viewrub',
	)); ?>
</div>
