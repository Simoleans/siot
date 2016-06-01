<span class="ez">
	<label  class="pull-left">
        <table class="table-striped pull-left">
		    <tr>
		        <td>
		          <a class="btn btn-primary" href="indexrub"><i class="glyphicon glyphicon-th-list"></i>
		          Listado de Rubros
		          </a>
		        </td>
		    </tr>
		</table> 
	</label>
	<?php require_once('APIcalendario.php');?>
	<?php require_once('FiltroEmpresa.php');?>
</span> 
<?php if (isset($_POST['buscar'])) { ?>
<?php 	if (isset($_POST['empresa'])) {
			foreach ($_POST['empresa'] as $valor) {
				$idem = $valor."<br>";
			}
			$results3 = Yii::app()->db->createCommand("SELECT empresa.razon_social,rubros.*,SUM(produccion) as prod
					FROM rubros 
					INNER JOIN reportes ON rubros.id_rubro=reportes.rubro_id
					INNER JOIN productos ON productos.id_producto=rubros.id_rubro 
					INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
					INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
					INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id WHERE empresa.id_empresa='".$idem."'
					GROUP BY id_rubro")->queryAll();
                    $comparar = count($results3); ?>
                    <?php foreach ($results3 as $result) 
					{ 
						$idrub = $result['id_rubro'];
					    $empresa = $result["razon_social"];  
					}
					?>
<?php 		if($comparar>0) { ?>
				<?php require_once('FiltroFechaRub.php');?>
				<?php require_once('_contenidofiltrofecha.php');?>
<?php        }else { ?>                    
				<!--SINO ENCUENTRA RESULTADOS IMPRIMO UN MENSAJE-->
                    <div style="padding-top:25%; padding-bottom:25%" align="center">
                        <span>
                            <i><h3><b>¡NO Existen RUBROS Asociados a la Empresa</b>
                               <b style="color:#A32121"><?php echo $empresa;?>!</b></h3> 
                            </i>
                        </span>
                    </div> 
<?php  } }else { ?>
        <!--SI HUBO ALGUN ERROR MUESTRO UN MENSAJE-->
            <div style="padding-top:25%; padding-bottom:25%" align="center">
                <span>
                    <i><?php echo "<h3><b style='color: #B50000;'>¡ERROR! No hay datos ingresados</b></h3>";?>
                    </i>
               </span>
            </div>
<?php } }else { ?>         
      <!--MUESTRO EL GRAFICO PREDETERMINADO SI NO CUMPLE NINGUNA CONDICION-->
      	<?php $results2 = Yii::app()->db->createCommand("SELECT rubros.*, SUM(produccion) AS prod 
														FROM rubros 
														INNER JOIN reportes ON reportes.rubro_id=rubros.id_rubro  
														GROUP BY id_rubro")->queryAll();?>
		<?php require_once('HCrub.php'); ?>
		<div  id="container2"></div>
<?php } ?>