<span class="ez">
	<label  class="pull-left">
        <table class="table-striped">
		    <tr>
		        <td>
		          <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/seguimiento/indexrub"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
          			<span class="fa fa-2x">Listado de Rubros</span>
		          </a>
		        </td>
		    </tr>
		</table> 
	</label>
</span> 
<?php 	if (isset($_POST['empresa'])) {
			foreach ($_POST['empresa'] as $valor) {
				$idem = $valor;
			}
		if (isset($_POST['year']) AND isset($_POST['mes'])){	
			require_once("YEAR_MES.php");
			$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,rubros.*,SUM(produccion) as prod
                            FROM reportes 
                            INNER JOIN productos ON productos.id_producto=reportes.producto_id
                            INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
                            INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
                            INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
                            INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id WHERE empresa.id_empresa='".$idem."' AND
                            reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."'
                            GROUP BY id_rubro")->queryAll();
                    $contar = count($results1); ?>
                    <?php foreach ($results1 as $result) 
					{ 
					    $empresa = $result["razon_social"]; 
					}?>
<?php 		if($contar>0) { ?>
				    <?php 	
							require_once('Botonera_fecha.php');
							require_once('HC/HCrubfiltro.php');
							echo "<div id='containerfiltro'></div>
							<table class='table' style='text-align: center;'>
				              	<tr>
				               		<td colspan='3' align='center' style='background-color:#F6F6F6;'>
				               			<b>PRODUCCION</b> 
				               			<b style='color:#A32121; text-transform: uppercase'> $newdate del $año  </b>
				               			<br> 
				               			<b style='color:#A32121'>($contar)</b> 
								        RUBROS ASOCIADOS LA EMPRESA  
								        <b style='color:#A32121'>$empresa</b>
								    </td>
								</tr>
							</table>"; 
							include('tabla_rub_empresa.php');
						}else{
							require_once('Botonera_fecha.php');
							echo "<div class='alert alert-danger alert-dismissible' role='alert'   align='center'>
								   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									  <span aria-hidden='true'>&times;</span>
								   </button>
								   <b class='badge'>$contar</b>
									  Produccion en <b style='color:#801212'>$newdate del $año</b>!
								</div>";
					}}else{
						echo "<div style='padding-top:25%; padding-bottom:25%' align='center'>
				                    <span>
				                        <i>
				                       	<h2>
				                          	¡Esta Empresa <b style='color:#801212'>NO</b> posee Reportes de Produccion!
				                        </h2> 
				                        </i>
				                    </span>
				            </div> ";
					
			}}else{
					$results1 = Yii::app()->db->createCommand("SELECT rubros.*, SUM(produccion) AS prod 
																		FROM productos 
																		INNER JOIN reportes ON reportes.producto_id=productos.id_producto
																		INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id  
																		GROUP BY id_rubro")->queryAll();
					$contar = count($results1);
						if ($contar>0) {
				      		include("Botonera_fecha.php");
				      		require_once('HC/HCrub.php');
					    	echo "<div id='container2'></div>";
					    	include('tabla_rub_empresa.php');
						}else{
							include("Mensaje_rub.php");
						}

			}
?>



