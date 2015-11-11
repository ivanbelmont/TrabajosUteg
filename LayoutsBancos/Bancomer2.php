
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
    <img src="IMG/BBVA BANCOMER.png">
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
      /*  echo "<br>";
        echo $Unidad."<br>".$enlace."<br>".$imagen;
        echo "<br>";*/
 $num=strlen($Unidad);//NUMERO TOTAL DE CARACTERES DE $Unidad
 "<br>";
 "<br>CIE ";
 $CIE = mb_substr($Unidad,0,5);
 "<br>";
$CIEFINALX=$CIE;

 "<br>REFERENCIA ";
 $REFERENCIA= $CIE = mb_substr($Unidad,5,$num);
 "<br>";

 "<br>OTROS ";
$buscar=".";
$resultado = strpos($enlace, $buscar);
 $otros = mb_substr($enlace, 0,$resultado);


 "<br><br>COMISION ";
$buscar2=".";
$comision = mb_substr($enlace, $resultado+2);
$resultado2 = strpos($comision, $buscar2);
 $comisionF = mb_substr($enlace, $resultado2,$resultado2+1);



 "<br><br>IMPORTE ";
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
 // "<b>".$comisionF[$a]."</b> ";
  if ($comision[$a]!=0) {
    // "ENTERO EN LA PISICION $inicio";
    break;
  }
  $inicio+=1;
}

$comisionF = mb_substr($comisionF, $inicio);//ENTEROS

/*BIEN*/
$resultadoDecimal = strpos($comision, $buscar3);//15
$comisionFII=mb_substr($comision, $resultadoDecimal,3);//DECIMALES

 $comisionF.$comisionFII;


 "<br><br>GUIA CIE ";
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
 (int) $CIEFINAL;//QUITAR CERO A LA IZQUIERDA

$buscarGion="-";
 "<br><br>FECHA ";
$resultadoFecha1 = strpos($CIE, $buscarGion);//16
$Fecha = mb_substr($comision, $resultadoI+1);
$resultadoFecha = strpos($Fecha, $buscarFecha);//16
$FechaF = mb_substr($Fecha, $resultadoFecha1-4);#Para PLAZA
$FechaSemiFinal = strripos($FechaF, $buscarGion);
 $FechaFINAL = mb_substr($FechaF,0, $FechaSemiFinal+3);

 "<br><br>PLAZA ";
 $Plaza = mb_substr($Fecha, $resultadoFecha1-4);
$PlazaSemiFinal = strripos($FechaF, $buscarGion);
 $PlzaFINAL = mb_substr($FechaF,$FechaSemiFinal+3);

 "<br><br>SUCURSAL ";
 $SUCURSAL = ereg_replace("[^0-9]", "", $imagen); //Incluir 0 [^0-9]
 $SUCURSAL; // resultado: 123

 "<br><br>TIPO PAGO ";
$TIPO_PAGO = ereg_replace("[^A-Z]", "", $imagen); //Incluir 0 [^0-9]
 $TIPO_PAGO;



//PARA SANTANDER
$FechaFINAL;
$ListaFecha=list($ANNIO, $MES,$DIA) = explode("-", $FechaFINAL);

$Hora="0705";
$clacon="0000";
$IMPORTESANTANDER=$comisionF;
$IMPORTESANTANDERII = mb_substr($comisionFII,1);
$SALDO_DEL_MOVIMIENTO="00000016955078";
//echo "Año: ".$ANNIO." Mes: ".$MES." Dia: ".$DIA;

 "<br><br><label style='color: RED;'> FORMATEADA PARA SANTANDER </label><br>";

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
 $FINAL[]=$CIEFINALX."           ".$MES.$DIA.$ANNIO.$Hora.$CerosAdd.$SUCURSAL.$clacon.$TIPO_PAGO.$EspaciosAdd."                         +".$CerosAddImp.$IMPORTESANTANDER.$IMPORTESANTANDERII.$SALDO_DEL_MOVIMIENTO.$CerosAddCIE.
(int) $CIEFINAL."".$REFERENCIA."          ";
$CerosAdd="";
$EspaciosAdd="";
$CerosAddImp= "";
$CerosAddCIE="";
//echo htmlspecialchars_decode($FINAL);
 "<br>------------------------------------------------------------------------------------------------------------------------------";


                }//END FOREACH
                $arrayCount=count($FINAL);
                $file = fopen("FORMATO BANAMEX".$FechArchivo.".txt", "w");
                for ($i=0; $i < $arrayCount; $i++) { 
                fwrite($file, $FINAL[$i]);
                fwrite($file, "\n");
                }//END FOR
                        

        fclose($file);
        $archive = "FORMATO BANAMEX".$FechArchivo.".txt";
          ?>
          <script languaje='javascript' type='text/javascript'>
          location.href="DescargarArchivo.php";
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
