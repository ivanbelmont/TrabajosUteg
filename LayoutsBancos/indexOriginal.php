
<!DOCTYPE html>
<html>
<!-- #############################  ACENTOS #############################  -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <head>
            
    <title>Enlaces de checadores</title>
              
  </head>
  <body>
    <?php
    
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_ALL,"es_ES");//Fecha Español
     $FechArchivo="-".date('d-m-Y');
    //http://php.net/manual/es/timezones.america.php


        /*QUITAMOS LOS ESPACIOS*/
$array = file('miarchivo.txt'); 
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

<script type="text/javascript">

$(document).ready(
    function()
    {
        var text='<?php echo $cadena_equipo; ?>';
        document.getElementById("Prueba").innerHTML = text;
    }
);
</script>

<form method="POST" action="">
<!-- <textarea id="Prueba"></textarea>-->
<br><input type="submit"><br>
<?php echo '<textarea required id="Prueba" name="Envio"  rows="10" cols="10" >'.preg_replace("/[ ]+/",' ',$Formatear).'</textarea>';?>
<!--<textarea required id="Prueba" name="Envio"  rows="10" cols="10"></textarea><br>-->
</form>
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
      /*  echo "<br>";
        echo $Unidad."<br>".$enlace."<br>".$imagen;
        echo "<br>";*/
echo $num=strlen($Unidad);//NUMERO TOTAL DE CARACTERES DE $Unidad
echo "<br>";
echo "<br>CIE ";
echo $CIE = mb_substr($Unidad,0,5);
echo "<br>";
$CIEFINALX=$CIE;

echo "<br>REFERENCIA ";
echo $REFERENCIA= $CIE = mb_substr($Unidad,5,$num);
echo "<br>";

echo "<br>OTROS ";
$buscar=".";
$resultado = strpos($enlace, $buscar);
echo $otros = mb_substr($enlace, 0,$resultado);


echo "<br><br>COMISION ";
$buscar2=".";
$comision = mb_substr($enlace, $resultado+2);
$resultado2 = strpos($comision, $buscar2);
echo $comisionF = mb_substr($enlace, $resultado2,$resultado2+1);



echo "<br><br>IMPORTE ";
$buscar3=".";
$importe=$comision;
$resultadoI = strpos($importe, $buscar3);
$comision = mb_substr($comision, $resultadoI+1);
$resultadoII = strpos($comision,$buscar3);//15 (.)
$comisionF = mb_substr($comision, 0,$resultadoII);
$num=strlen($comisionF);
$inicio=0;
For($a=0; $a<=$num; $a++)
{
 //echo "<b>".$comisionF[$a]."</b> ";
  if ($comision[$a]!=0) {
    //echo "ENTERO EN LA PISICION $inicio";
    break;
  }
  $inicio+=1;
}

$comisionF = mb_substr($comisionF, $inicio);//ENTEROS

/*BIEN*/
$resultadoDecimal = strpos($comision, $buscar3);//15
$comisionFII=mb_substr($comision, $resultadoDecimal,3);//DECIMALES

echo $comisionF.$comisionFII;


echo "<br><br>GUIA CIE ";
$buscarCero="0"; 
$CIE = mb_substr($comision, $resultadoI+1);
$resultadoCIE = strpos($CIE, $buscarCero);//1
$CIESEMIFINAL = mb_substr($CIE, $resultadoCIE);
$buscarGionCIE="-";
$resultadoBGION = strpos($CIE, $buscarGionCIE);//16
$CIEBUACAR = mb_substr($CIESEMIFINAL, 0,$resultadoBGION);
$resultadoBGION2 = strpos($CIEBUACAR, $buscarGionCIE);
# --------------- BIEN -------------------
 $CIEBUACAR2 = mb_substr($CIESEMIFINAL, 0,$resultadoBGION2-4);
 $CIEFINAL = $CIEBUACAR2;
echo (int) $CIEFINAL;//QUITAR CERO A LA IZQUIERDA

$buscarGion="-";
echo "<br><br>FECHA ";
$resultadoFecha1 = strpos($CIE, $buscarGion);//16
$Fecha = mb_substr($comision, $resultadoI+1);
$resultadoFecha = strpos($Fecha, $buscarFecha);//16
$FechaF = mb_substr($Fecha, $resultadoFecha1-4);#Para PLAZA
$FechaSemiFinal = strripos($FechaF, $buscarGion);
echo $FechaFINAL = mb_substr($FechaF,0, $FechaSemiFinal+3);

echo "<br><br>PLAZA ";
 $Plaza = mb_substr($Fecha, $resultadoFecha1-4);
$PlazaSemiFinal = strripos($FechaF, $buscarGion);
echo $PlzaFINAL = mb_substr($FechaF,$FechaSemiFinal+3);

echo "<br><br>SUCURSAL ";
 $SUCURSAL = ereg_replace("[^0-9]", "", $imagen); //Incluir 0 [^0-9]
echo $SUCURSAL; // resultado: 123

echo "<br><br>TIPO PAGO ";
$TIPO_PAGO = ereg_replace("[^A-Z]", "", $imagen); //Incluir 0 [^0-9]
echo $TIPO_PAGO;



//PARA SANTANDER
$FechaFINAL;
$ListaFecha=list($ANNIO, $MES,$DIA) = explode("-", $FechaFINAL);

$Hora="0705";
$clacon="0000";
$IMPORTESANTANDER=$comisionF;
$IMPORTESANTANDERII = mb_substr($comisionFII,1);
$SALDO_DEL_MOVIMIENTO="00000016955078";
//echo "Año: ".$ANNIO." Mes: ".$MES." Dia: ".$DIA;

echo "<br><br><label style='color: RED;'> FORMATEADA PARA SANTANDER </label><br>";

/*echo $FINAL=$CIEFINALX."     ".$MES.$DIA.$ANNIO.$Hora.$SUCURSAL.$clacon.$TIPO_PAGO."                          +".$IMPORTESANTANDER.$IMPORTESANTANDERII.$SALDO_DEL_MOVIMIENTO.
(int) $CIEFINAL.$REFERENCIA."          ";*/


////////////////////// VALIDAR SUCURSAL ///////////////////////////////////
$NuemeroSucursal=strlen($SUCURSAL);

if($NuemeroSucursal<4)
{
  $operacion=4-$NuemeroSucursal;
  for ($i=0; $i < $operacion; $i++) { 
   echo $CerosAdd.= "0";
  }
}
/////////////////////////// VALIDAR TIPO PAGO //////////////////////////////

$NuemeroSucursal=strlen($TIPO_PAGO);

if($NuemeroSucursal<15)
{
  $operacion=15-$NuemeroSucursal;
  for ($i=0; $i < $operacion; $i++) { 
   $EspaciosAdd.= " ";
  }
}
//////////////////////////// IMPORTE SANTANDER /////////////////////////////////////////////////
$NuemeroSucursal=strlen($IMPORTESANTANDER);

if($NuemeroSucursal<14)
{
  $operacion=12-$NuemeroSucursal;
  for ($i=0; $i < $operacion; $i++) { 
    $CerosAddImp.= "0";
  }
}

//////////////////////////// REFERENCIA ALFA SANTANDER /////////////////////////////////////////////////
$NuemeroCieFinal=strlen((int) $CIEFINAL);

if($NuemeroCieFinal<8)
{
  $operacion=8-$NuemeroCieFinal;
  for ($i=0; $i < $operacion; $i++) { 
    $CerosAddCIE.= "0";
  }
}
echo $FINAL[]=$CIEFINALX."000000     ".$MES.$DIA.$ANNIO.$Hora.$CerosAdd.$SUCURSAL.$clacon.$TIPO_PAGO.$EspaciosAdd."                         +".$CerosAddImp.$IMPORTESANTANDER.$IMPORTESANTANDERII.$SALDO_DEL_MOVIMIENTO.$CerosAddCIE.
(int) $CIEFINAL."".$REFERENCIA."           ";
$CerosAdd="";
$EspaciosAdd="";
$CerosAddImp= "";
$CerosAddCIE="";
//echo htmlspecialchars_decode($FINAL);
echo "<br>------------------------------------------------------------------------------------------------------------------------------";


                }//END FOREACH
                $arrayCount=count($FINAL);
                $file = fopen("FORMATO BANAMEX".$FechArchivo.".txt", "w");
                for ($i=0; $i < $arrayCount; $i++) { 
                fwrite($file, $FINAL[$i]);
                fwrite($file, "\n");
                }//END FOR
                        

        fclose($file);
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
