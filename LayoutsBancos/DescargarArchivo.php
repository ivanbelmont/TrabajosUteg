<?php 


			date_default_timezone_set('America/Mexico_City');
			setlocale(LC_ALL,"es_ES");//Fecha Español
			$FechArchivo="-".date('d-m-Y');
			$archive = "FORMATO BANCOMER".$FechArchivo.".txt";

			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=$archive");
			header("Pragma: no-cache");
			header("Expires: 0");
			
			/*FORZAR DESCARGA*/
			 $array = file($archive); 
			$array = array_filter($array, function($s) 
			{ 
			return ! empty($s); 
			});

			$cantidad=count($array);

			/*CREAMOS EL NUEVO FORMATO SIN ESPACIOS*/
			for ($i=0; $i < $cantidad ; $i++) 
			{ 
			trim($arrays= $array[$i]."<br>");
			}
			$cadena_equipo = implode("<br>", $array);
			echo strip_tags($cadena_equipo."<br>");  
?>