<?php
$this->breadcrumbs=array(
	'Produccion Por Rubros'=>array('indexrub'),
);
?>
<span class="ez">Listado de Rubros
	<div class="pull-right">
	<a href="viewrub" class="btn btn-primary btn-lg"><i class="fa fa-pie-chart"></i> Produccion General</a>
    </div>
</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_viewrub',
	)); ?>
</div>
