<?php

$this->breadcrumbs=array(
	'Produccion Por Productos',
);

?>
<span class="ez">Productos Registrados</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_viewpro',
	)); ?>
</div>


