<?php
if (isset($_POST['buscar'])) {
	if (isset($_POST['region'])){
		$region = $_POST['region'];
			if ($region=="occidente") {
				$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
                INNER JOIN productos ON productos.id_producto=reportes.producto_id
                INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
                INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
                INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
                INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
                INNER JOIN estado ON estado.id_estado=plantas.estado_id
                WHERE estado.estado IN ('BARINAS','MERIDA','TRUJILLO','TACHIRA','ZULIA') GROUP BY id_planta")->queryAll();
                $contar = count($results1);
                if($contar==0){ 
                	require("partials/form_region.php");
                	include("partials/mensaje.php");
                	require("partials/contenidoreg.php");
                }else{
	                require("partials/span_regiones.php");
	                require("partials/botonera_fecha_mes_ano.php");
	                require("partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('partials/tabla_region.php');
            	}

			}elseif ($region=="centro") {
				$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado IN ('ARAGUA','CARABOBO','DTTO.CAPITAL','MIRANDA','VARGAS') GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
                if($contar==0){ 
                	require("partials/form_region.php");
                	include("partials/mensaje.php");
                	require("partials/contenidoreg.php");
                }else{
	                require("partials/span_regiones.php");
	                require("partials/botonera_fecha_mes_ano.php");
	                require("partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('partials/tabla_region.php');
            	}

			}elseif ($region=="centro-occidente") {
				$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado IN ('COJEDES','FALCON','LARA','PORTUGUESA','YARACUY') GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
                if($contar==0){ 
                	require("partials/form_region.php");
                	include("partials/mensaje.php");
                	require("partials/contenidoreg.php");
                }else{
	                require("partials/span_regiones.php");
	                require("partials/botonera_fecha_mes_ano.php");
	                require("partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('partials/tabla_region.php');
            	}

			}elseif ($region=="llanos") {
				$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado IN ('APURE','BARINAS','GUARICO') GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
                if($contar==0){ 
                	require("partials/form_region.php");
                	include("partials/mensaje.php");
                	require("partials/contenidoreg.php");
                }else{
	                require("partials/span_regiones.php");
	                require("partials/botonera_fecha_mes_ano.php");
	                require("partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('partials/tabla_region.php');
            	}

			}elseif ($region=="guayana") {
				$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado IN ('AMAZONAS') GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
                if($contar==0){ 
                	require("partials/form_region.php");
                	include("partials/mensaje.php");
                	require("partials/contenidoreg.php");
                }else{
	                require("partials/span_regiones.php");
	                require("partials/botonera_fecha_mes_ano.php");
	                require("partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('partials/tabla_region.php');
            	}

			}elseif ($region=="oriente") {
				$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado 
			    IN ('ANZOATEGUI','DELTA AMACURO','MONAGAS','NUEVA ESPARTA','SUCRE','BOLIVAR') GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
                if($contar==0){ 
                	require("partials/form_region.php");
                	include("partials/mensaje.php");
                	require("partials/contenidoreg.php");
                }else{
                	require("partials/span_regiones.php");
	                require("partials/botonera_fecha_mes_ano.php");
					require("partials/HC/HCrubplanta.php");
		            echo "<div id='containerrubplanta'></div>";
		            require('partials/tabla_region.php');
	            }    

			}elseif ($region!="") {
				require("partials/form_region.php");
                require("partials/mensaje_incorrecto.php");
                require("partials/contenidoreg.php");
			}
	}else{
		require("partials/form_region.php");
        require("partials/mensaje_incorrecto.php");
        require("partials/contenidoreg.php");
 }}else{
 			if(isset($_POST['mes'])){
			require_once("partials/YEAR_MES.php");
			$region = $_POST['region'];

	       	if($region=="occidente"){
	       		$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado 
			    IN ('BARINAS','MERIDA','TRUJILLO','TACHIRA','ZULIA') 
			    AND reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."' GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
			       	if($contar>0){
			       		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('partials/tabla_region.php');
			      	}else{
			      		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/mensaje_regiones.php");
			       	}

	       }elseif($region=="centro"){
	       		$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado 
			    IN ('ARAGUA','CARABOBO','DTTO.CAPITAL','MIRANDA','VARGAS')
			    AND reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."' GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
			    	if($contar>0){
			       		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('partials/tabla_region.php');
			      	}else{
			      		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");?>
			      		<div class='alert alert-danger alert-dismissible' role='alert'   align='center' style="margin-bottom:0">
   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	  <span aria-hidden='true'>&times;</span>
	</button>
	  <b class='badge'><?php echo $contar;?></b> 
	  <b>Resultados Encontrados Para</b>
	  <b style='color:#A32121; text-transform: uppercase;'><?php echo "$region en $newdate del $año";?></b>!
</div>
			       		<?php 
			       	} 

	       	}elseif($region=="centro-occidente"){
	       		$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado 
			    IN ('COJEDES','FALCON','LARA','PORTUGUESA','YARACUY')
			    AND reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."' GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
			    	if($contar>0){
			       		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('partials/tabla_region.php');
			      	}else{
			      		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/mensaje_regiones.php");
			       	}

	       	}elseif($region=="llanos"){
	       		$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado 
			    IN ('APURE','BARINAS','GUARICO')
			    AND reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."' GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
			    	if($contar>0){
			       		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('partials/tabla_region.php');
			      	}else{
			      		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/mensaje_regiones.php");
			       	}

	       	}elseif($region=="guayana"){
	       		$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado 
			    IN ('AMAZONAS')
			    AND reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."' GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
			    	if($contar>0){
			       		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('partials/tabla_region.php');
			      	}else{
			      		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/mensaje_regiones.php");
			       	}

	       	}elseif($region=="oriente"){
	       		$results1 = Yii::app()->db->createCommand("SELECT empresa.razon_social,plantas.nombre_planta,rubros.*,SUM(produccion) as prod,estado.estado 
				FROM reportes 
			    INNER JOIN productos ON productos.id_producto=reportes.producto_id
			    INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
			    INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
			    INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
			    INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id
			    INNER JOIN estado ON estado.id_estado=plantas.estado_id
			    WHERE estado.estado 
			    IN ('ANZOATEGUI','DELTA AMACURO','MONAGAS','NUEVA ESPARTA','SUCRE','BOLIVAR')
			    AND reportes.fecha_reporte BETWEEN '".$desde."' AND '".$hasta."' GROUP BY id_planta")->queryAll();
			    $contar = count($results1);
			    	if($contar>0){
			       		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('partials/tabla_region.php');
			      	}else{
			      		require("partials/span_regiones.php");
			      		require("partials/botonera_fecha_mes_ano.php");
			       		require("partials/mensaje_regiones.php");
			       	}

	       	}elseif($region!=""){
	       		require("partials/Form_region.php");
                require("partials/mensaje_incorrecto.php");
                require("partials/contenidoreg.php");

	       	}else{
	       		echo "ERROR!";
	       	}
        }else{
       	 	require("partials/form_region.php");
			require("partials/contenidoreg.php");
	    }
}
?>