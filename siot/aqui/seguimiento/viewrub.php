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
	$empresa_name = array();
	$results = Yii::app()->db->createCommand("SELECT rubros.*,empresa.* 
												FROM rubros 
												LEFT JOIN empresa 
												ON rubros.id_rubro=empresa.id_empresa")->queryAll(); 

	$results2 = Yii::app()->db->createCommand("SELECT rubros.nombre_rubro,reportes.produccion 
												FROM rubros 
												LEFT JOIN reportes 
												ON rubros.id_rubro=reportes.rubro_id")->queryAll();
		foreach ($results2 as $result) {
			$nombre_rubro_otro []= $result['nombre_rubro'];
			$reporte_produccion []= $result['produccion'];
		}
	    foreach($results AS $result){
			$idrub = $result['id_rubro'];
			$nomrub = $result['nombre_rubro'];
			$EMnombre [] = $result['razon_social'];
			$EMnombre2 = $result['razon_social'];
			$IDEMnombre2 = $result['id_empresa'];
			$RUnombre [] = $result['nombre_rubro'];
	  		$rubros_name [] = array($nomrub,$idrub);
	  		$empresa_name [] = array($EMnombre2);

		}
?>
 <script>  
      $(function () {
      	//var datosname=$.parseJSON(<?php echo json_encode($empresa_name); ?>);//Nueva linea
     var datos=<?php echo preg_replace( "/\"(\d+)\"/", '$1', json_encode($rubros_name)); ?>;
     var datosnombres=<?php echo json_encode($empresa_name); ?>;
        $('#container2').highcharts({
          chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: true,
                type: 'pie'
            },
          credits: { enabled: false, }, 
          exporting: { enabled: true, },
          title: {
            text: 'Rubros (%)',
            style: {
              fontWeight: '800',
              fontSize: '20px'
            }           
          },
          tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
          series: [{
                name: 'Porcentaje',
                colorByPoint: true,
                data:datos,
           
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
				<td width="50%">Empresa Asociada</td>
				<td width="50%">Rubros</td>
				<td width="50%">Rubro/Repor</td>
				<td width="50%">Produccion</td>
			</tr>	
		<tr class="success" align="center">
		<?php
			if ($EMnombre===null) {
				$vacio = 'Vacio';
		?>
			<?php echo "<td>join($RUnombre,'<br>')</td>";?>
  			<?php echo "<td>$vacio</td>";?>
		<?php }else{?>
			<td><?php echo join($EMnombre,'<br>');?></td>
			<td><?php echo join($RUnombre,'<br>');?></td>
			<td><?php echo join($nombre_rubro_otro,'<br>');?></td>
			<td><?php echo join($reporte_produccion,'<br>');?></td>
		<?php }?>
	</table>
  </div>

<!--$results = Yii::app()->db->createCommand("SELECT empresa.razon_social,rubros.nombre_rubro,reportes.produccion 
												FROM rubros 
												LEFT JOIN empresa ON rubros.id_rubro=empresa.id_empresa
												LEFT JOIN reportes ON rubros.id_rubro=reportes.rubro_id ")->queryAll();  -->

<!--$results = Yii::app()->db->createCommand("SELECT rubros.nombre_rubro, reportes.produccion, empresa.razon_social  
FROM rubros LEFT JOIN reportes ON rubros.id_rubro=reportes.rubro_id INNER JOIN productos ON rubros.id_rubro=productos.rubro_id 
INNER JOIN producto_planta ON productos.id_producto=producto_planta.producto_id INNER JOIN plantas ON producto_planta.planta_id=plantas.id_planta 
INNER JOIN empresa ON plantas.empresa_id=empresa.id_empresa ")->queryAll();  -->	