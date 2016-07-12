<?php
$id = $model->id_rubro;
$nombrerub = $model->nombre_rubro;
$ok=
Yii::app()->db->createCommand("SELECT plantas.nombre_planta,SUM(produccion) as prod
                    		  FROM reportes 
                    		  INNER JOIN productos ON productos.id_producto = reportes.producto_id
                    		  INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
							  INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id  
                   		 	  WHERE productos.rubro_id = '".$id."' Group BY id_planta")->queryAll();
							$comparar = count($ok);  
?>
<?php if($comparar>0) {?>
<span class="ez">
	<label  class="pull-left">
        <table class="table-striped">
		    <tr>
		        <td>
		          <a class="btn btn-primary" href="../../indexrub"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
          			<span class="fa fa-2x">Listado de Rubros</span>
		          </a>
		        </td>
		    </tr>
		</table> 
	</label>
	<?php require_once("FiltroFecha.php");?>
</span>
      
<?php
if (isset($_POST['buscar'])) {
	if (isset($_POST['from']) AND isset($_POST['to'])) {

		$from = $_POST['from'];
		$to = $_POST['to'];
		$fecha1 = date('Y-m-d',strtotime(str_replace('/', '-', $from)));
        $fecha2 = date('Y-m-d',strtotime(str_replace('/', '-', $to)));

$results1=
Yii::app()->db->createCommand("SELECT plantas.nombre_planta,reportes.fecha_reporte,SUM(produccion) as prod
                    		  FROM reportes 
                    		  INNER JOIN productos ON productos.id_producto = reportes.producto_id
                    		  INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
							  INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id  
                   		 	  WHERE productos.rubro_id = '".$id."' AND reportes.fecha_reporte BETWEEN '".$fecha1."' AND '".$fecha2."' Group BY id_planta")->queryAll();
							$comparar = count($results1);?>        
<?php if($comparar>0) {?>			
			<?php require_once('HC/HCrubplanta.php'); ?>
			<div  id="containerrubplanta"></div>
			<table class="table" style="text-align: center;">
               	<tr>
               		<td colspan="3" align="center" style="background-color:#F6F6F6;">
               		<b style="color:#A32121">(<?php echo $comparar;?>)</b> 
			        PLANTAS ASOCIADAS AL RUBRO  
			        <b style="color:#A32121"><?php echo $nombrerub;?></b>
			        DENTRO DE LAS FECHAS
			        <b style="color:#A32121"><?php echo $from;?></b>
			        AL 
			        <b style="color:#A32121"><?php echo $to;?></b> 			        
			        </td>
               	</tr>
            </table>                	
			<?php include("tabla_rub.php");?>	
<?php }else{ ?>
		<div class='alert alert-danger alert-dismissible' role='alert'   align='center'>
		    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    	<span aria-hidden='true'>&times;</span>
		    </button>
		    <b class='badge'><?php echo $comparar;?></b>
		    Produccion desde <b style='color:#801212'><?php echo "$from";?></b>
		    Hasta <?php echo "<b style='color:#AE1D1D;'>$to</b>"; ?>!
		</div>
<?php }} else {?>
		<div style="padding-top:25%; padding-bottom:25%" align="center">
                <span>
                    <i>
                       	<h2>
                          	¡OOOPSS! Ocurrio un error!
                        </h2> 
                    </i>
                </span>
        </div> 
<?php }}else {

$results1=
Yii::app()->db->createCommand("SELECT plantas.nombre_planta,SUM(produccion) as prod
                    		  FROM reportes 
                    		  INNER JOIN productos ON productos.id_producto = reportes.producto_id
                    		  INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
							  INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id  
                   		 	  WHERE productos.rubro_id = '".$id."' Group BY id_planta")->queryAll();
							$comparar = count($results1);?>  
<?php require_once('HC/HCrubplanta.php'); ?>
			
			<div  id="containerrubplanta"></div>
			<table class="table" style="text-align: center;">
               	<tr>
               		<td colspan="3" align="center" style="background-color:#F6F6F6;"><b style="color:#A32121">(<?php echo $comparar;?>)</b> 
			        PLANTAS ASOCIADAS AL RUBRO  
			        <b style="color:#A32121"><?php echo $nombrerub;?></b>
			        </td>
               	</tr>
            </table>
			<?php include("tabla_rub.php");?>

<?php }}else {?>
<span class="ez">
	<label  class="pull-left">
        <table class="table-striped">
		    <tr>
		        <td>
		          <a class="btn btn-primary" href="../../indexrub"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
          			<span class="fa fa-2x">Listado de Rubros</span>
		          </a>
		        </td>
		    </tr>
		</table> 
	</label>
</span>
<?php include("Mensaje_rub.php");?>
<?php }?>
  
			
