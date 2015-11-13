
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
//Quitar espacios en blanco Array

$array = str_replace(" ","",$array ); 
//var_dump($array);

/*CANTIDAD DEL ARRAY*/
$cantidad=count($array);
   
/*CREAMOS EL NUEVO FORMATO SIN ESPACIOS*/
for ($i=0; $i < $cantidad ; $i++) 
{ 
  trim($arrays= $array[$i]."<br>");
}

////////////////////////////////////////// AQUI PARA IMPRIMIR RESULTADO ///////////////////////////////////////////////////////////////////////
$cadena_equipo = implode("<br>", $array);
$cadena_equipo."<br>";
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
<br><a title="Regresar" href="index.php">Regresar</a><br>
<?php

if(isset($_POST['Envio'])){
$texto=$_POST['Envio'];

 /*CREAMOS EL NUEVO TXT SIN ESPACIOS*/
    $file = fopen("Formato.txt", "w");
    fwrite($file, $texto);
    fclose($file);



    $filas=file('Formato.txt');
    foreach($filas as $value){
        
        list($Unidad,$enlace,$imagen) = explode(" ", $value);
       echo "<br>";
          $Layout=$Unidad.$enlace.$imagen;
        echo "<br>";
     //   echo "Numero de Caracteres= ".$ContarLinea = strlen($Layout)."<br>";
                                        $ContarLinea = strlen($Layout);

        $Bandera=0;
        $Cortar=-1;
                $file = fopen("SEPARADOR".".txt", "w");
        for ($i=0; $i <= $ContarLinea; $i++) { 

        //$buscar1="|";
        //$resultado1 = strpos($Layout, $buscar1);
        $buscar1="|";
        
         //echo  
         $Layout[$i];
        
            fwrite($file, $Layout[$i]);
       
        if ($Layout[$i]=='|') {
          $Bandera+=1;

          if ($Bandera==6) {
         $Especial="<br>";
            $Bandera=0;
            fwrite($file, "@");
            fwrite($file, "\n");
          }//END IF BANDERA
        }//END IF RES

             $Final[$i];
          $Cortar+=1;
        }//END FOR
                fclose($file);
//echo "<br>";




$file = fopen("FORMATO BANCOMER".$FechArchivo.".txt", "w");
    $filasSep=file('SEPARADOR.txt');
    foreach($filasSep as $valueSep)
    {
      list($Pago) = explode("@", $valueSep);
      echo  "<br>------------------------------------------------------------------------------------------------------------------------------";
      echo "<br> PRINCIPAL ".$Pago."<br>";
      ################################ FECHA #########################################################
      $buscarP="|";
      $resultadoP = strpos($Pago, $buscarP);
      echo  "<br>FECHA ";
      echo $FechaBan = mb_substr($Pago,0,$resultadoP);
      echo "<br> FECHA FINAL ";
      $FechaFinal=checkFech($FechaBan); #PARA TXT

      #################################### TIPO PAGO #####################################################
      echo  "<br>TIPO PAGO ";
       echo
       $TipoPag = mb_substr($Pago,$resultadoP+1);
      echo "<br>";
      echo
       $ResultadoTip=strpos($TipoPag,$buscarP);
      echo "<br>";
      echo $TipoPagFinal=mb_substr($TipoPag,0,$ResultadoTip);#PARA TXT
      if ($TipoPagFinal=='') 
      {
        echo $TipoPagFinal="NO_DEFINIDO";
      }
      echo "<br>";

      #################################### MOVIMIENTO #####################################################
      echo "<br>MOVIMIENTO ";
      $resultadoMov=stripos($TipoPag, $buscarP);
       $MovimientoPAg=mb_substr($TipoPag,$resultadoMov+1);
      $resultadoMov2=stripos($MovimientoPAg, $buscarP);
      echo $MovimientoPAgFin=mb_substr($MovimientoPAg,0,$resultadoMov2);#PARA TXT
      echo "<br>";
      #################################### REFERENCIA 1 #####################################################

      echo "<br>REFERENCIA UNO ";
      //echo 
      $Ref1=mb_substr($MovimientoPAg,0);
      $resultRef=stripos($Ref1,$buscarP);
       $Ref1Bus=mb_substr($Ref1,$resultRef+1);
      $resultRef2=stripos($Ref1Bus, $buscarP);

      echo $RefFINAL=mb_substr($Ref1Bus,0,$resultRef2);#PARA TXT
      echo "<br>";

     #################################### REFERENCIA 2 #####################################################

            echo "<br>REFERENCIA DOS ";
      
      $Ref2=mb_substr($Ref1Bus,0);
      $resultREF2=stripos($Ref2,$buscarP);
      $Ref2Sub=mb_substr($Ref2,$resultREF2+1);
      $resultREF22=stripos($Ref2Sub,$buscarP);
      echo $Ref2FIN=mb_substr($Ref2Sub,0,$resultREF22);#PARA TXT

      echo "<br>";

      #################################### IMPORTE #####################################################


      echo "<br>IMPORTE ";

      $ImporteBan=mb_substr($Ref2Sub,0);
      $resultImporte=stripos($ImporteBan,$buscarP);
      $ImporteBan2=mb_substr($ImporteBan,$resultImporte+1);
      $resultImporte2=stripos($ImporteBan2, $buscarP);
      $ImporteBanFINAL=mb_substr($ImporteBan2,0,$resultImporte2);

      $DecimalesB=mb_substr($ImporteBan2,0,$resultImporte2);
      $buscarDecimales=stripos($DecimalesB,".");
      if ($buscarDecimales>=1) {
       $ImporteBanFINAL=mb_substr($DecimalesB,0,$buscarDecimales);
                               }
       echo $ImporteBanFINAL;

      echo "<br>";
     #################################### DECIMALES #####################################################

            echo "<br>DECIMALES ";

      $DecimalesB=mb_substr($ImporteBan2,0,$resultImporte2);
      $buscarDecimales=stripos($DecimalesB,".");

    if ($buscarDecimales>=1) {
    echo $Decimales=mb_substr($DecimalesB,$buscarDecimales+1);#PARA TXT

    $ContDec=strlen($Decimales);
    echo "<br>[".$ContDec."]";

    if ($ContDec==1) {
      $Decimales=$Decimales."0";
      echo $Decimales;
                     }
                             }
      else
      { 
        echo $Decimales='00'; 
      }
      echo "<br>";

   
    $Cuenta='775770';
    $Hora='0520';
    $clacon='0000';
    $SUCURSAL='2501';
    $SALDO_DEL_MOVIMIENTO='00000016955078';
    $REFINT='06986149';$MovimientoPAgFin;


    ################################################# VALIDAR TIPO PAGO ##############################################

    if(strlen($TipoPagFinal)<15)
{
  $operacion=15-strlen($TipoPagFinal);
  for ($i=0; $i < $operacion; $i++) { 
   $EspaciosAdd.= " ";
  }
}

################################################# VALIDAR IMPORTE ##############################################

$TipoPagoDescFinal=strlen($ImporteBanFINAL.$Decimales);

if($TipoPagoDescFinal<15)
{
  $operacion=14-$TipoPagoDescFinal;
  for ($i=0; $i < $operacion; $i++) { 
   $EspaciosCeros.= "0";
  }
}

$Cuenta="0153512495";

 $FINAL=$Cuenta."      ".checkFech($FechaBan).$Hora.
 $SUCURSAL.$clacon.$TipoPagFinal.$EspaciosAdd."                         +"
 .$EspaciosCeros.$ImporteBanFINAL.$Decimales.$SALDO_DEL_MOVIMIENTO.$REFINT.$Ref2FIN."          ";
//echo htmlspecialchars_decode($FINAL);
$EspaciosAdd="";
$EspaciosCeros= "";

  fwrite($file, $FINAL);
  fwrite($file, "\n");

 }

                }//END FOREACH
              /*  $arrayCount=count($FINAL);
                $file = fopen("FORMATO BANCOMER".$FechArchivo.".txt", "w");
                for ($i=0; $i < $arrayCount; $i++) { 
                fwrite($file, $FINAL[$i]);
                fwrite($file, "\n");
                }//END FOR*/
                        

        fclose($file);
        $archive = "FORMATO BANCOMER".$FechArchivo.".txt";
          ?>
          <script languaje='javascript' type='text/javascript'>
          location.href="DescargarArchivo.php";
          </script>
          <?php
              }//END IF(ISSET)
                else{}
                  function checkFech($fecha)
                {
                   $numero=strlen($fecha);

                  if ($numero==6) {
                    $texto = $fecha; 
                    $cantidad_x_grupo=2;
                     $lista = str_split($texto,$cantidad_x_grupo); 
                        $mes= $lista[1];
                        $dia= $lista[0];
                        $annio= $lista[2];
                return         $Fecha=$mes.$dia."20".$annio;
                        
                                   }//END IF 6
                  if ($numero==4) {
                

                    $texto=mb_substr($fecha,0,2); 
                    $cantidad_x_grupo=1;
                     $lista = str_split($texto,$cantidad_x_grupo); 
                         $dia= "0".$lista[0];
                         $mes= "0".$lista[1];
                         $annio= mb_substr($fecha,2);
                    return $Fecha=$mes.$dia."20".$annio;
                  }//END IF 4
                  if ($numero==5) {

                return      $Fecha=formatfechcorrect($fecha); 
                 
                  }//END IF 5

                
                }

function check_in_range($start_date, $end_date, $evaluame)
 { 
 $start_ts = strtotime($start_date);
 $end_ts = strtotime($end_date);
 $user_ts = strtotime($evaluame);
 return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
 } 

 function formatfechcorrect($Fechas)
 {
  $annio = date("Y");
//$Fechas[$i];
  $cantidad_x_grupo=1;
   //$texto=$Fechas[$i]; 
    $texto=$Fechas; 
                    $cantidad_x_grupo=1;
                     $lista = str_split($texto,$cantidad_x_grupo); 
                         $var =$lista[0];
                         $var2=$lista[1];
                         $var3=$lista[2];
                         $var4=$lista[3];
                         $var5=$lista[4];

                         $final=$var.$var2."-0".$var3."-".$annio;
if (
  $final=='11-01-2015'  || $final== '21-01-2015' || 
  $final == '31-01-2015'|| $final == '11-02-2015'|| 
  $final == '21-02-2015' ) {
    $actualFech=date('d-m-Y');
    //$actualFech='22-02-2015';//PRUEBA
    //echo "<b>".$actualFech."</b>";
    $FechaRestDay=strtotime('-15 day',strtotime ($actualFech ));
    $FechaRestDay = date ('d-m-Y', $FechaRestDay);
    //echo " <b>".$FechaRestDay."</b>";



    if (check_in_range($FechaRestDay,$actualFech,$final)) {
       //$final=$var.$var2."-0".$var3."-".$annio;
       $final="0".$var3.$var.$var2.$annio;
    }
    else
    {
      //$final="0".$var."-".$var2.$var3."-".$annio;
      $final=$var2.$var3."0".$var.$annio;
    } 
}

else
{

    if( check_in_range('01-01-'.$annio, '30-09-'.$annio,$final) )
    {
    //$final=$var.$var2."-0".$var3."-".$annio;
    $final="0".$var3.$var.$var2.$annio;
    
    } 
    else {
    //$final="0".$var."-".$var2.$var3."-".$annio;
    $final=$var2.$var3."0".$var.$annio;


    } //END ELSE check_in_range
  
} //ELSE CONFLICTO

return $final;
 }//END formatfechcorrect

    ?>

        </div>


        </div>
        </div>

     <script type="text/javascript">

     </script>
    
  </body>
</html>
