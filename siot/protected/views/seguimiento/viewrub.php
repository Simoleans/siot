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
<span class="ez">
	<label  class="pull-left">
		 	<a class="btn btn-primary" href="../../indexrub"><i class="glyphicon glyphicon-th-list"></i>
          Listado de Rubros
          </a>
	</label>
	<b class="pull-right" style="">Hoy es <?php echo date('d-m-Y');?></b>
</span>
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(),
	)); ?>
<?php 
	$rubros_name = array();
	$total = array();

	$results2 = Yii::app()->db->createCommand("SELECT rubros.*, SUM(produccion) AS prod 
		                                FROM rubros left JOIN  reportes ON rubros.id_rubro=reportes.rubro_id  
		                                  GROUP BY nombre_rubro order by reportes.produccion DESC")->queryAll();

		foreach ($results2 as $result) {
			$nombre_rubro_otro []= $result['nombre_rubro'];
			$reporte_produccion []= $result['prod'];
			$porcentaje []= $result['prod'] * 100;

			$idrub = $result['id_rubro'];
			$nomrub = $result['nombre_rubro'];
			$produccion = $result['prod'];
			$rubros_name [] = array($nomrub,$idrub);
      $total [] = array($porcentaje);
		}
?>
 <script>  
     $(function () {
    var chart = new Highcharts.Chart(
    {
      chart:{

     renderTo:'container2'


          },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
     exporting:{

      enabled:true

          },
          plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
     title:{

      text:'Produccion rubros'

          },
     credits:{

      enabled:false

            },
     series:[{
           type:'pie',
           name:'name of serie',
           data:[
           <?php $results2 = Yii::app()->db->createCommand("SELECT rubros.*, SUM(produccion) AS prod 
                                    FROM rubros INNER JOIN  reportes ON rubros.id_rubro=reportes.rubro_id  
                                      GROUP BY nombre_rubro order by reportes.produccion ASC")->queryAll();

    foreach ($results2 as $result) { ?>
                ['<?php echo $result["nombre_rubro"]; ?>' , <?php echo $result["prod"]; ?>],
                <?php } ?>
               
           ]
         }]
    });
});
    </script>
    
  <div
  style="border: solid 2px #C00F13" id="container2">
  </div>
  <br>
 <div class="col-md-12">
	<table align="center" class="table table-bordered" style="text-align: center" border="1">
			<tr class="btn-danger">
				<td width="10%">Rubro</td>
				<td width="10%">Produccion</td>
				<td width="10%">Prueba</td>
			</tr>	
		<tr class="success" align="center">
			<td><?php echo join($nombre_rubro_otro,'<br>');?></td>
			<td><?php echo join($reporte_produccion,'<br>');?> </td>
			<td><?php echo join($porcentaje,'<br>');?> </td>
	</table>
  <center><h4>El error es que no agarra bien la produccion , Falta que funcione lo de agregar usuarios nuevos( Casi resuelto )</h4></center>
  </div>