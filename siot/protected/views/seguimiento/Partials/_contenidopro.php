<?php
  
    $id = $model->id_producto;
    $nombre = $model->nombre_producto;
  //consulta para traerme la produccion por producto mediante el id sociado a la tabla reportes
    $results = Yii::app()->db->createCommand("SELECT reportes.*
    FROM reportes INNER JOIN productos ON productos.id_producto = reportes.producto_id
    WHERE productos.id_producto = '".$id."' ORDER BY reportes.id_reporte DESC limit 7 ")->queryAll();


  foreach($results AS $result){
      $toneladas [] = intval($result['produccion']);
      $fecha = date("d-m-Y | g:i a", strtotime($result['fecha_reporte']));  
      $des [] = $result["descripcion"];
      $f [] = array($fecha);
    }
?>
<!--ANTES DE MOSTRAR CUALQUIER COSA PREGUNTO SI HAY PRODUCCION--> 
<?php if (isset($toneladas)) { ?>
  <?php require_once('HC/APIcalendario.php');?>
  <span class="ez col-xs-12">
    <table class="table-striped pull-left">
      <tr>
        <td>
          <a class="btn btn-primary" href="../../indexpro"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
          <span class="fa fa-2x">Listado de Productos</span>
          </a>
        </td>
      </tr>
    </table>
      <?php require_once('FiltroFecha.php');?>
  </span>
    <?php //--->SI HAY PRODUCCION PREGUNTO SI EL BOTON FUE CLICKEADO<----//
            if (isset($_POST['buscar'])) { ?>
                  <?php if (isset($_POST['from']) AND isset($_POST['to'])) {
                  //--->PREGUNTO SI HAY FECHAS EN LOS CAMPOS INPUT Y LAS CONNVIERTO A FORMATO NECESARIO
                    $FechaFiltro = array();  
                    $from = $_POST['from'];
                    $to = $_POST['to'];
                    $desde = date('Y-m-d',strtotime(str_replace('/', '-', $from)));
                    $hasta = date('Y-m-d',strtotime(str_replace('/', '-', $to)));
                    $results2 = Yii::app()->db->createCommand("SELECT reportes.fecha_reporte,reportes.produccion,reportes.descripcion
                    FROM reportes INNER JOIN productos ON productos.id_producto = reportes.producto_id 
                    WHERE productos.id_producto = '".$id."' AND reportes.fecha_reporte 
                    BETWEEN '".$desde."' AND '".$hasta."' ORDER BY reportes.id_reporte ASC")->queryAll();
                    $comparar = count($results2); ?>
                          <!--VERIFICO SI LA QUERY TUVO RESULTADOS-->      
                          <?php if ($comparar>0) { ?>
                                    <?php foreach ($results2 AS $res): ?>
                                      <?php $fecha2 = date("d-m-Y | g:i a", strtotime($res['fecha_reporte'])); ?> 
                                      <?php $toneladas2 [] = intval($res['produccion']);?>
                                      <?php $FechaFiltro []= array($fecha2);?>
                                    <?php endforeach ?>
                          <?php require_once('HC/HCprofiltro.php');?>
                                <div id='containerfiltro'></div>
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
          <?php require_once('HC/HCpro.php'); ?>
                <div id='container2'></div>
<?php  } }else { ?>
<!--MUESTRO UN MENSAJE SI EL PRODUCTO NO POSEE NINGUN REPORTE--> 
<span class="ez col-xs-12">
    <label  class="pull-left">
        <td>
          <a class="btn btn-primary" href="../../indexpro"><i class="glyphicon glyphicon-th-list"></i>
          Listado de Productos
          </a>
        </td>
    </label>
  </span>
    <div style="padding-top:25%; padding-bottom:25%" align="center">
      <span>
          <i><?php echo "<h3><b style='color: #B50000;'>".$nombre."</b></h3>
                        <h3><b>¡NO Posee Ningun Reporte de Produccion!</b></h3>";?></i>
      </span>
    </div>
<?php }?> 
