
<!DOCTYPE html>
<html>
<!-- #############################  ACENTOS #############################  -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <head>
            
    <title>LayOut Bancomer</title>
              
  </head>
  <body>
    <img src="IMG/logo_banorte.png">
    <?php
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_ALL,"es_ES");//Fecha Español
     $FechArchivo="-".date('d-m-Y');
    //http://php.net/manual/es/timezones.america.php

//Subimos el txt

     $miarchivo=$_POST['archivo'];
     move_uploaded_file($_FILES['archivo']['tmp_name'],"miarchivo.txt");
        /*QUITAMOS LOS ESPACIOS*/

$array = file("miarchivo.txt"); 
$array = array_filter($array, function($s) 
{ 
  return ! empty($s); 
});

//echo $array[0]."<br>";
//var_dump($array);

/*CANTIDAD DEL ARRAY*/
$cantidad=count($array);
   
/*CREAMOS EL NUEVO FORMATO SIN ESPACIOS*/
for ($i=0; $i < $cantidad ; $i++) 
{ 
     trim($arrays= $array[$i]."<br>");
}

/*
$cadena_con_espacios = 'ola                   ke  ase         '; 
$cadena_sin_espacios = preg_replace ('/[ ]+/', ' ', $cadena_con_espacios);
echo "<textarea>".$cadena_sin_espacios."</textarea>"; 
*/


////////////////////////////////////////// AQUI PARA IMPRIMIR RESULTADO ///////////////////////////////////////////////////////////////////////
$cadena_equipo = implode("<br>", $array);
/*echo*/ $cadena_equipo."<br>";
$textoFinal=$cadena_equipo;


$buscarInicio="Total";
echo $resultadoInicio = strpos($textoFinal, $buscarInicio);

$Formatear=strip_tags($textoFinal);//Quitar <br> y demas de html
?>



<form method="POST" action="">
<!-- <textarea id="Prueba"></textarea>-->
<br><input type="submit" name="Crear" value="Crear txt"><br>
<?php echo '<div style=""><textarea style="display:none;" required id="Prueba" name="Envio"  rows="10" cols="10" >'.preg_replace("/[ ]+/",' ',$Formatear).'</textarea></div>';?>
<!--<textarea required id="Prueba" name="Envio"  rows="10" cols="10"></textarea><br>-->
</form>
<br><a title="Regresar" href="index.php">Regresar</a>
<?php

if(isset($_POST['Envio'])){
$texto=$_POST['Envio'];

 /*CREAMOS EL NUEVO TXT SIN ESPACIOS*/
    $file = fopen("Formato.txt", "w");
    fwrite($file, $texto);
    fclose($file);



    $filas=file('Formato.txt');
    foreach($filas as $value){
        
        list($Unidad, $enlace,$imagen) = explode(" ", $value);
         "<br>";
         $Unidad."<br>".$enlace."<br>".$imagen;//Vista General
         "<br>";


############################# NUMERO DE CUENTA  #######################################################
 $num=strlen($Unidad);//NUMERO TOTAL DE CARACTERES DE $Unidad
echo  "<br>";
echo "<br>CUENTA ";
echo  $CIE = mb_substr($Unidad,0,5);
echo "<br>";
$CIEFINALX=$CIE; # PARA TXT

############################# FECHA DE PAGO  #######################################################
 echo "<br>FECHA ";
 $fechaPago1=mb_substr($enlace,22);
 echo $fechaPago2=mb_substr($fechaPago1,0,8);

 $anioPag=mb_substr($fechaPago1,0,4); //AÑO
 $mesPag=mb_substr($fechaPago1,4,2); //MES
 $diaPag=mb_substr($fechaPago1,6,2); //DIA
 echo "<br>";
$fechaPagoFINAL=$mesPag.$diaPag.$anioPag; # PARA TXT

############################# HORA DE PAGO  #######################################################

echo "<br>";
echo "HORA ";
echo $horaPag=mb_substr($enlace,12,4);
echo "<br>";

$HoraPagFinal=$horaPag; # PARA TXT

############################# SUCURSAL  #######################################################


echo "<br>";
echo "SUCURSAL ";
echo $sucursalPag=mb_substr($enlace,8,4);
echo "<br>";


$SucursalPagFinal=$sucursalPag; # PARA TXT

############################# CLACON  #######################################################


$claconFinal="0000"; # PARA TXT

############################# DESCRIPCION DE PAGO  #######################################################

echo "<br>";
echo "DESCRIPCION DE PAGO ";
 $TipoPagoDesc=mb_substr($Unidad,22,2);

switch ($TipoPagoDesc) {
	case 'V1':
		$Detalle="VENTANILLA";
		break;
	case 'A1':
		$Detalle="CAJERO";
		break;
	case 'I1':
		$Detalle="INTERNET";
		break;
	default:
		# code...
		break;
}

echo $DET=$Detalle.$DescPag=mb_substr($enlace,31,5);# PARA TXT
echo "<br>";


echo $TipoPagoDescFinal=strlen($DET);

if($TipoPagoDescFinal<15)
{
  $operacion=15-$TipoPagoDescFinal;
  for ($i=0; $i < $operacion; $i++) { 
  	echo "+";
   $EspaciosAdd.= " ";
  }
}



############################# SIGNO DE LA OPERACION  #######################################################

$SignoFinal="+";


############################# IMPORTE TOTAL  #######################################################


echo "<br>";
echo "IMPORTE ";
echo $ImportePag=mb_substr($Unidad,28,14);# PARA TXT
echo "<br>";

############################# SALDO TOTAL  #######################################################

$SaldoPagFinal = "00000000000000";

############################# REFERNCIA INTERNA  #######################################################

$ReferenciaInterna="00000000";


############################# REFERNCIA  #######################################################


echo "<br>";
echo "REFERENCIA ";
echo $ReferenciaPag=mb_substr($Unidad,79);# PARA TXT
echo "<br>";


$CIEFINALX="0288525800";

$FINAL[]=$CIEFINALX."      ".$fechaPagoFINAL.$HoraPagFinal.
 $SucursalPagFinal.$claconFinal.
 $DET.$EspaciosAdd."                         ".$SignoFinal.
 $ImportePag.
 $SaldoPagFinal.
$ReferenciaInterna."".$ReferenciaPag."          ";
//echo htmlspecialchars_decode($FINAL);
$EspaciosAdd="";
echo  "<br>------------------------------------------------------------------------------------------------------------------------------";


                }//END FOREACH
                $arrayCount=count($FINAL);
                $file = fopen("FORMATO BANORTE".$FechArchivo.".txt", "w");
                for ($i=0; $i < $arrayCount; $i++) { 
                fwrite($file, $FINAL[$i]);
                fwrite($file, "\n");
                }//END FOR
                        

        fclose($file);
        $archive = "FORMATO BANORTE".$FechArchivo.".txt";
          ?>
          <script languaje='javascript' type='text/javascript'>
        location.href="DescargarArchivoBanorte.php"; //Aqui para descargar
          </script>
          <?php
              }//END IF(ISSET)
                else{}
    ?>

        </div>


        </div>
        </div>

     <script type="text/javascript">

     </script>
    
  </body>
</html>
