    <?php //--->SI HAY PRODUCCION PREGUNTO SI EL BOTON FUE CLICKEADO<----//
            if (isset($_POST['buscarfecha'])) { ?>
                  <?php if (isset($_POST['from']) AND isset($_POST['to'])) {
                  //--->PREGUNTO SI HAY FECHAS EN LOS CAMPOS INPUT Y LAS CONNVIERTO A FORMATO NECESARIO
                    $FechaFiltro = array();  
                    $from = $_POST['from'];
                    $to = $_POST['to'];
                    $desde = date('Y-m-d',strtotime(str_replace('/', '-', $from)));
                    $hasta = date('Y-m-d',strtotime(str_replace('/', '-', $to)));
                    $results4 = Yii::app()->db->createCommand("SELECT empresa.razon_social,rubros.*,reportes.fecha_reporte,SUM(produccion) as prod
                    FROM rubros 
                    INNER JOIN reportes ON rubros.id_rubro=reportes.rubro_id
                    INNER JOIN productos ON productos.id_producto=rubros.id_rubro 
                    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
                    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
                    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id WHERE empresa.id_empresa='".$idem."' AND reportes.fecha_reporte 
                    BETWEEN '".$desde."' AND '".$hasta."' GROUP BY id_rubro")->queryAll();
                    $comparar = count($results4); ?>
                          <!--VERIFICO SI LA QUERY TUVO RESULTADOS-->      
                          <?php if ($comparar>0) { ?>
                                    <?php foreach ($results4 AS $res): ?>
                                      <?php $fecha2 = date("d-m-Y | g:i a", strtotime($res['fecha_reporte'])); ?> 
                                      <?php $toneladas2 [] = intval($res['prod']);?>
                                    <?php endforeach ?>
                          <?php require_once('HCrubfiltrofecha.php');?>
                                <div id='containerfiltrofecha'></div>
                                <div class="col-xs-12" align="center">
                                  <h4>
                                    <b style="color:#A32121">(<?php echo $comparar;?>)</b> 
                                    REPORTES ENCONTRADOS DESDE  
                                    <b style="color:#A32121"><?php echo $from;?></b>
                                    HASTA EL
                                    <b style="color:#A32121"><?php echo $to;?></b> 
                                  </h4>
                                </div>
                          <?php }else{ ?>
                          <!--SINO COINCIDE LA BUSQUEDA MUESTRO UN MENSAJE-->
                                  <div style="padding-top:25%; padding-bottom:25%" align="center">
                                    <span>
                                        <i><h3>¡<b>No Se Encontraron Reportes de Produccion Desde</b></h3>
                                           <h3><b style="color:#A32121"><?php echo $from;?></b>
                                           <b>AL</b> 
                                           <b style="color:#A32121"><?php echo $to;?></b>!</h3> 
                                        </i>
                                    </span>
                                  </div> 
                <?php  } }else {?>
                <!--SI HUBO ALGUN ERROR MUESTRO UN MENSAJE-->
                        <div style="padding-top:25%; padding-bottom:25%" align="center">
                            <span>
                              <i><?php echo "<h3><b style='color: #B50000;'>¡ERROR! No hay datos ingresados</b></h3>";?>
                              </i>
                            </span>
                        </div>
      <?php } }else { ?>          
          <!--MUESTRO EL GRAFICO PREDETERMINADO SI NO CUMPLE NINGUNA CONDICION-->
          <?php require_once('HCrubfiltro.php');?>
                    <div id='containerfiltro'></div>
                    <div align="center">
                        <h4>
                            <b style="color:#A32121">(<?php echo $comparar;?>)</b> 
                            RUBROS ENCONTRADOS EN LA EMPRESA  
                            <b style="color:#A32121"><?php echo $empresa;?></b>
                        </h4>
                    </div>
<?php  } ?>