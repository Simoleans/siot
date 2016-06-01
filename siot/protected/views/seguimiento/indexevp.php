<?php

$this->breadcrumbs=array(
	'Produccion Por Productos',
);

?>
<span class="ez">Productos Registrados</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_viewevp',
	)); ?>
</div>

    <table class="table table-brodered" align="center">
    <tr class="danger" align="center">
        <td style="font-family: georgia">
          <h1>"Empresa" vs "Planta" en desarrollo...</h1>
        </td>
      </tr>
    </table>

