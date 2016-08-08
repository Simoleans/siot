 <?php 	
							if(isset($_POST['mes2'])) {
								$año = date("Y");//// AÑO ACTUAL
								$mes = $_POST['mes2'];//// MES TRAIDO DEL FORMULARIO
								$ultimodia = cal_days_in_month(CAL_GREGORIAN, $mes, $año);//// OBTENGO EL ULTIMO DIA DEL MES SEGUN EL CALENDARIO
								$fecha1 = "01-".$mes."-$año";//// PASO LA FECHA INICIO
								$fecha2 = "$ultimodia-".$mes."-$año";/// PASO LA FECHA FIN
								$desde = date('Y-m-d',strtotime(str_replace('/', '-', $fecha1)));///// CONVIERTO AL FORMATO DE LA BD
								$hasta = date('Y-m-d',strtotime(str_replace('/', '-', $fecha2)));///// CONVIERTO AL FORMATO DE LA BD
								$newdate = date('F',strtotime(str_replace('/', '-', $fecha1)));///// CONVIERTO PARA MOSTRAR EL MES EN LA VISTA
								if ($newdate=="January") $newdate="Enero";
								if ($newdate=="February") $newdate="Febrero";
								if ($newdate=="March") $newdate="Marzo";
								if ($newdate=="April") $newdate="Abril";
								if ($newdate=="May") $newdate="Mayo";
								if ($newdate=="June") $newdate="Junio";
								if ($newdate=="July") $newdate="Julio";
								if ($newdate=="August") $newdate="Agosto";
								if ($newdate=="September") $newdate="Septiembre";
								if ($newdate=="October") $newdate="Octubre";
								if ($newdate=="November") $newdate="Noviembre";
								if ($newdate=="December") $newdate="Diciembre";
								$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,rubros.*,SUM(produccion) as prod
		                            FROM reportes 
		                            INNER JOIN productos ON productos.id_producto=reportes.producto_id
		                            INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
		                            INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
		                            INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
		                            INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id WHERE empresa.id_empresa='".$idem."' AND reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."'
		                            GROUP BY id_rubro")->queryAll();
								$contar = count($results1);
								if ($contar>0) {
									require_once('HC/HCrub.php');
									require_once('Botonera2_fecha.php');
									echo "<div id='container2'></div>
									<table class='table' style='text-align: center;'>
		                            	<tr>
		                            		<td colspan='3' align='center' style='background-color:#F6F6F6;'><b style='color:#A32121'>(<?php echo $contar;?>)</b> 
						                RUBROS ASOCIADOS LA EMPRESA  
						                <b style='color:#A32121'><?php echo $empresa;?></b>
						                	</td>
						                </tr>
						            </table> "; 
									require_once('tabla_rub_empresa.php');
								}else{
									require_once('Botonera2_fecha.php');
									echo "<div style='padding-top:25%; padding-bottom:25%' align='center'>
						                    <span>
						                        <i>
						                       	<h2>
						                          	¡NO Existe Produccion en el Mes de <b style='color:#801212'>$newdate</b>!
						                        </h2> 
						                        </i>
						                    </span>
						               </div> ";
							}}else{  }?>