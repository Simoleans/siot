<?php 
			$año = $_POST['year'];//// AÑO ACTUAL
			$mes = $_POST['mes'];//// MES TRAIDO DEL FORMULARIO
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
?>