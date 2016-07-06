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
                	require("Partials/Form_region.php");
                	include("Partials/Mensaje.php");
                	require("Partials/contenidoreg.php");
                }else{
	                require("Partials/span_regiones.php");
	                require("Partials/Botonera_fecha_mes_ano.php");
	                require("Partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('Partials/tabla_region.php');
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
                	require("Partials/Form_region.php");
                	include("Partials/Mensaje.php");
                	require("Partials/contenidoreg.php");
                }else{
	                require("Partials/span_regiones.php");
	                require("Partials/Botonera_fecha_mes_ano.php");
	                require("Partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('Partials/tabla_region.php');
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
                	require("Partials/Form_region.php");
                	include("Partials/Mensaje.php");
                	require("Partials/contenidoreg.php");
                }else{
	                require("Partials/span_regiones.php");
	                require("Partials/Botonera_fecha_mes_ano.php");
	                require("Partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('Partials/tabla_region.php');
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
                	require("Partials/Form_region.php");
                	include("Partials/Mensaje.php");
                	require("Partials/contenidoreg.php");
                }else{
	                require("Partials/span_regiones.php");
	                require("Partials/Botonera_fecha_mes_ano.php");
	                require("Partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('Partials/tabla_region.php');
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
                	require("Partials/Form_region.php");
                	include("Partials/Mensaje.php");
                	require("Partials/contenidoreg.php");
                }else{
	                require("Partials/span_regiones.php");
	                require("Partials/Botonera_fecha_mes_ano.php");
	                require("Partials/HC/HCrubplanta.php");
	                echo "<div id='containerrubplanta'></div>";
	                require('Partials/tabla_region.php');
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
                	require("Partials/Form_region.php");
                	include("Partials/Mensaje.php");
                	require("Partials/contenidoreg.php");
                }else{
                	require("Partials/span_regiones.php");
	                require("Partials/Botonera_fecha_mes_ano.php");
					require("Partials/HC/HCrubplanta.php");
		            echo "<div id='containerrubplanta'></div>";
		            require('Partials/tabla_region.php');
	            }    

			}elseif ($region!="") {
				require("Partials/Form_region.php");
                require("Partials/Mensaje_incorrecto.php");
                require("Partials/contenidoreg.php");
			}
	}else{
		require("Partials/Form_region.php");
        require("Partials/Mensaje_incorrecto.php");
        require("Partials/contenidoreg.php");
 }}else{
 			if(isset($_POST['mes'])){
			require_once("Partials/YEAR_MES.php");
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
			       		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('Partials/tabla_region.php');
			      	}else{
			      		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/Mensaje_Regiones.php");
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
			       		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('Partials/tabla_region.php');
			      	}else{
			      		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/Mensaje_Regiones.php");
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
			       		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('Partials/tabla_region.php');
			      	}else{
			      		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/Mensaje_Regiones.php");
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
			       		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('Partials/tabla_region.php');
			      	}else{
			      		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/Mensaje_Regiones.php");
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
			       		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('Partials/tabla_region.php');
			      	}else{
			      		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/Mensaje_Regiones.php");
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
			       		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/HC/HCrubplanta.php");
				        echo "<div id='containerrubplanta'></div>";
				        require('Partials/tabla_region.php');
			      	}else{
			      		require("Partials/span_regiones.php");
			      		require("Partials/Botonera_fecha_mes_ano.php");
			       		require("Partials/Mensaje_Regiones.php");
			       	}

	       	}elseif($region!=""){
	       		require("Partials/Form_region.php");
                require("Partials/Mensaje_incorrecto.php");
                require("Partials/contenidoreg.php");

	       	}else{
	       		echo "ERROR!";
	       	}
        }else{
       	 	require("Partials/Form_region.php");
			require("Partials/contenidoreg.php");
	    }
}
?>