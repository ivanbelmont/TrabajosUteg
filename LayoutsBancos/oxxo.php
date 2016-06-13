
<!DOCTYPE html>
<html>
<!-- #############################  ACENTOS #############################  -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <head>
            
    <title>LayOut OXXO</title>
              
  </head>
  <body>
    <img src="IMG/Oxxo_Logo.svg.png">
    <?php
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_ALL,"es_ES");//Fecha Español
     $FechArchivo="-".date('d-m-Y');
    //http://php.net/manual/es/timezones.america.php

//Subimos el txt

     //$miarchivo=$_POST['archivo'];
     move_uploaded_file($_FILES['archivo']['tmp_name'],"miarchivo.txt");
        /*QUITAMOS LOS ESPACIOS*/

$array = file("miarchivo.txt"); 
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
////////////////////////////////////////// AQUI PARA IMPRIMIR RESULTADO ///////////////////////////////////////////////////////////////////////
 $cadena_equipo = implode("<br>", $array);
 
$cadena_equipo."<br>";
$textoFinal=$cadena_equipo;


$buscarInicio="Total";
$resultadoInicio = strpos($textoFinal, $buscarInicio);

 $Formatear=strip_tags($textoFinal);//Quitar <br> y demas de html
?>



<form method="POST" action="">
<!-- <textarea id="Prueba"></textarea>-->
<br><input type="submit" name="Crear" value="Crear txt"><br>
<?php $valor1 = preg_replace("/[ ]+/",' ',$Formatear); ?>
<?php echo '<div style=""><textarea style="display:none;" required id="Prueba" name="Envio"  rows="10" cols="10" >'.str_replace(" ","_%",$valor1).'</textarea></div>';?>
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
        
  list($UnidadT) = explode(" ", $value);

  "<br>".$UnidadT."<br>";




$buscar=",";
$resultado = strpos($UnidadT, $buscar);
 $RefOxxo1 = mb_substr($UnidadT,$resultado+1);

 "<br>";
$buscar=",";
$resultado = strpos($RefOxxo1, $buscar);
 $RefOxxo2 = mb_substr($RefOxxo1,$resultado+1);

 "<br>";
$buscar=",";
$resultado = strpos($RefOxxo2, $buscar);
 $RefOxxo3 = mb_substr($RefOxxo2,$resultado+1);

 "<br>";
$buscar=",";
$resultado = strpos($RefOxxo3, $buscar);
 $RefOxxo4 = mb_substr($RefOxxo3,$resultado+1);

 "<br>";
$buscar=",";
$resultado = strpos($RefOxxo4, $buscar);
 $RefOxxoFinal = mb_substr($RefOxxo4,0,$resultado);



echo "<h1>".$RefOxxoFinal."</h1>";



 

 $FINAL[]=$RefOxxoFinal;
//echo htmlspecialchars_decode($FINAL);
 echo "<br>------------------------------------------------------------------------------------------------------------------------------";


                }//END FOREACH
                $arrayCount=count($FINAL);
                $file = fopen("FORMATO OXXO".$FechArchivo.".txt", "w");
                for ($i=0; $i < $arrayCount; $i++) { 
                fwrite($file, $FINAL[$i]);
                fwrite($file, "\n");
                }//END FOR
                        

        fclose($file);
        $archive = "FORMATO OXXO".$FechArchivo.".txt";
          ?>
          <script languaje='javascript' type='text/javascript'>
          location.href="DescargarArchivoOXXO.php";
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
