<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php  
include 'conexion.php';
conectar(1);
$id=$_GET['id'];

?>
<script src="jquery-2.1.3.min.js" ></script>


<?php 


$sql_encuestas="SELECT count(*) count   FROM rt4.Uteg_Encuesta e where e.ticket_id=".$id;

$consEnc=mysql_query($sql_encuestas) or die (mysql_error());

$filaEncu=mysql_fetch_array($consEnc,MYSQL_BOTH) or die (mysql_error());

$sqlticket="SELECT t.id,u.RealName Creado_Por, t.Subject,TRUNCATE((t.TimeWorked/60),0)Horas_invertidas,
t.Created creado,t.Resolved Resuelto,datediff(t.Resolved , t.Created) dias_Resolucion,
(SELECT us.RealName FROM rt4.Users us WHERE us.id=t.LastUpdatedBy) Cerro,t.Status
FROM rt4.Tickets t,rt4.Users u
WHERE u.id = t.Creator
AND t.id=".$id;

$consulta=mysql_query($sqlticket) or die (mysql_error());

?>
<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-2 col-lg-1 hidden-xs hidden-sm">
                <?php
                $fila=mysql_fetch_array($consulta,MYSQL_BOTH) or die (mysql_error());

               
                ?>
                    <h1><?php echo "Ticket #".$fila['id']; ?></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-10 col-lg-8">
                    <div class="row text-center">
                        <div class="col-xs-3 col-sm-2">
                            <h2 title="<?php echo utf8_encode($fila['Subject']); ?>" class="animation-hatch">
                                <strong>Asunto</strong><br>
                                <small><i class="fa fa-file-o"></i> <?php echo utf8_encode(substr($fila['Subject'],0,12)."..."); ?></small>
                            </h2>
                        </div>
                        <div class="col-xs-3 col-sm-2">
                            <h2 title="<?php echo utf8_encode($fila['Creado_Por']); ?>" class="animation-hatch">
                                <strong>Creado</strong><br>
                                <small><i class="fa fa-male"></i><br> <?php echo utf8_encode(substr($fila['Creado_Por'],0,20)."..."); ?></small>
                            </h2>
                        </div>
                        <div class="col-xs-3 col-sm-2">
                            <h2 title="Fecha de Creacion <?php echo ConvetidorFechas($fila['creado'],3); ?>" class="animation-hatch">
                                <strong>Creacion</strong><br>
                                <small><i class="fa fa-calendar-o"></i><br> <?php echo ConvetidorFechas($fila['creado'],2); ?></small>
                            </h2>
                        </div>
                        <!-- We hide the last stat to fit the other 3 on small devices -->
                        <div class="col-xs-3 col-sm-2">
                            <h2 title="<?php echo utf8_encode($fila['Cerro']); ?>" class="animation-hatch">
                                <strong>Cerrado</strong><br>
                                <small><i class="fa fa-male"></i><br> <?php echo utf8_encode(substr($fila['Cerro'],0,20)."..."); ?></small>
                            </h2>
                        </div>
                        <div class="col-xs-3 col-sm-2">
                            <h2 title="Fecha de Cierre <?php echo ConvetidorFechas($fila['Resuelto'],3); ?>" class="animation-hatch">
                                <strong>Cerro</strong><br>
                                <small><i class="fa fa-calendar-o"></i><br> <?php echo ConvetidorFechas($fila['Resuelto'],2); ?></small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <h2 title="<?php 
                                if($fila['Status']=='resolved')
                                {
                                  echo $fila['dias_Resolucion']." dias de resolucion";
                                }
                                else
                                {
                                  echo "El ticket sigue abierto";
                                }

                                 ?>" class="animation-hatch">
                                <strong>Dias</strong><br>
                                <small><i class="fa fa-check-square-o"></i><br> <?php 
                                if($fila['Status']=='resolved')
                                {
                                  echo $fila['dias_Resolucion']." dias de resolucion";
                                }
                                else
                                {
                                  echo "El ticket sigue abierto";
                                }

                                 ?></small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- END Top Stats -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- ############################################################################################################################################################################## IVAN  -->
    <?php 

function ConvetidorFechas($fecha,$opcion)
{

switch ($opcion) {
  case 1:
    #En numero
  $year=substr($fecha,0,4); 
$month=substr($fecha,5,2); 
$day=substr($fecha,8,2); 
echo $fecha=$day."-".$month."-".$year;
    break;
  case 2:
    # Letras
$year=substr($fecha,0,4); 
$month=substr($fecha,5,2); 
$day=substr($fecha,8,2);
  switch ($month) {
          case 1: $month='Enero'; break;
          case 2: $month='Febrero'; break;
          case 3: $month='Marzo'; break;
          case 4: $month='Abril'; break;
          case 5: $month='Mayo'; break;
          case 6: $month='Junio'; break;
          case 7: $month='Julio'; break;
          case 8: $month='Agosto'; break;
          case 9: $month='Septiembre';  break;
          case 10: $month='Octubre'; break; 
          case 11: $month='Noviembre'; break;
          case 12: $month='Diciembre'; break;
    break;
 
}//END switch Letras
echo $fecha=$day." de ".$month." del ".$year;
break;
case 3:
#Dia y mes letras
$year=substr($fecha,0,4); 
$month=substr($fecha,5,2); 
$day=substr($fecha,8,2);

$dayN=date("D", strtotime($fecha)); 

switch ($dayN) {

  case 'Sun': $dayL='Domingo'; break;
  case 'Mon': $dayL='Lunes'; break;
  case 'Tue': $dayL='Martes'; break;
  case 'Wed': $dayL='Miercoles'; break;
  case 'Fri': $dayL='Viernes'; break;
   case 'Thu': $dayL='Jueves'; break;
   case 'Sat': $dayL='Sabado'; break;
   
   default:
     # code...
     break;
 } 

  switch ($month) {
          case 1: $month='Enero'; break;
          case 2: $month='Febrero'; break;
          case 3: $month='Marzo'; break;
          case 4: $month='Abril'; break;
          case 5: $month='Mayo'; break;
          case 6: $month='Junio'; break;
          case 7: $month='Julio'; break;
          case 8: $month='Agosto'; break;
          case 9: $month='Septiembre';  break;
          case 10: $month='Octubre'; break; 
          case 11: $month='Noviembre'; break;
          case 12: $month='Diciembre'; break;
    break;
 
}//END switch Letras
echo $fecha=$dayL." ".$day." de ".$month." del ".$year;
  break;
 default:
    echo "NULL";
    break;

}


}

    ?>
    <style type="text/css">

html { 
  background: url(fondo.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  background-size: cover;
}

#form {
  width: 250%;
  margin: 0 auto;
  height: 50%;
}

#form p {
  text-align: center;
}

#form label {
  font-size: 20px;
}

input[name="estrellas"] {
 display: none;
}
input[name="estrellas2"] {
 display: none;
}

.labelInf2 {
  
  color: #2E9AFE;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label[name="estrellasLabel1"]:hover,
label[name="estrellasLabel1"]:hover ~ label[name="estrellasLabel1"] {
  color: orange;
}
input[name="estrellas"]:checked ~ label[name="estrellasLabel1"] {
  color: orange;
}

label[name="estrellasLabel2"]:hover,
label[name="estrellasLabel2"]:hover ~ label[name="estrellasLabel2"] {
  color: orange;
}
input[name="estrellas2"]:checked ~ label[name="estrellasLabel2"] {
  color: orange;
}
.labelStar
{
  text-shadow: 0px 0px 2px #000000;
  color: #2E9AFE;
  font-size:30px;
}
hr {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
textarea
{
  
  width:70%;
  height:10%;
  border:2px dashed #3B85C1;
  autofocus:true;

}

#paginacion {
    width: 100%;
  margin: 0 auto;
  height: 20%;
  border-radius: 10px 200px 100px 0px;
  -moz-border-radius: 10px 200px 100px 0px;
  -webkit-border-radius: 10px 200px 100px 0px;
  border: 0px hidden #000000;
  background-color: #e0d8c7;
}
</style>
<script type="text/javascript">

function Uncheck(id,tipo,aparece) {
  var ids=id;
  var tipos=tipo;
  var apareceq=aparece;
  if(tipos==3)
  {
    if(apareceq==1)
    {
      
    $('#label4').css('display','block');//Cambiar valor CSS mostrar
   $('#panel4').css('display','block');//Cambiar valor CSS mostrar
    } 
        if(apareceq==0)
    {
   $('#panel4').css('display','none');//Cambiar valor CSS mostrar
   $('#label4').css('display','none');//Cambiar valor CSS mostrar
    } 
       //alert(tipos);

  }
  var elements = document.getElementById(ids);
  //alert(elements);
  elements.checked =false;
 
}
</script>
<form action="resque.php" method="POST" >
<div class="row">
  <div align='center'>
<?php
 if ($fila['Status']=='resolved')
                {
if($filaEncu['count']==0){

$id_label=0;
    $sql="SELECT * FROM Uteg_Pregunta WHERE estatus_id <>1";

    $cons=mysql_query($sql) or die (mysql_error());
    
    while ($file=mysql_fetch_object($cons)) {
 $style='<style type="text/css">

input[name="'.$file->pregunta_id.'"] {
 display: none;
}

label[name="'.$file->pregunta_id.'"]:hover,
label[name="'.$file->pregunta_id.'"]:hover ~ label[name="'.$file->pregunta_id.'"] {
  color: orange;
}
input[name="'.$file->pregunta_id.'"]:checked ~ label[name="'.$file->pregunta_id.'"] {
  color: orange;
}
</style>';

 $style2='<style type="text/css">

input[name="'.$file->pregunta_id.'"] {
 display: none;
}

label[name="'.$file->pregunta_id.'"]:hover,
label[name="'.$file->pregunta_id.'"]:hover ~ label[name="'.$file->pregunta_id.'"] {
  color: orange;
}
input[name="'.$file->pregunta_id.'"]:checked ~ label[name="'.$file->pregunta_id.'"] {
  color: orange;
}


input[name="'.$file->pregunta_id.'X"] {
 display: none;
}

label[name="'.$file->pregunta_id.'X"]:hover,
label[name="'.$file->pregunta_id.'X"]:hover ~ label[name="'.$file->pregunta_id.'X"] {
  color: orange;
}
input[name="'.$file->pregunta_id.'X"]:checked ~ label[name="'.$file->pregunta_id.'X"] {
  color: orange;
}
</style>';

 if($file->tipopregunta_id==2) { 
      ?>
      
      <?php 
        echo $style;
        ?>
                <div class="col-sm-12 col-lg-12">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div  align ="center" class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-left animation-pullDown">
                       <label class="labelStar"><?php echo utf8_encode($file->descripcion); ?></label><br>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <p class="clasificacion">
       <input id="<?php echo 'radio'.$id_label; ?>"     checked='true' type="radio" name="<?php echo $file->pregunta_id; ?>" value="5"><!--
    --><label name="<?php echo $file->pregunta_id; ?>"  for="<?php echo 'radio'.$id_label; $id_label++; ?>"    class="labelStar">★</label><!--
    --><input id="<?php echo 'radio'.$id_label; ?>"     type="radio" name="<?php echo $file->pregunta_id; ?>" value="4"><!--
    --><label name="<?php echo $file->pregunta_id; ?>"  for="<?php echo 'radio'.$id_label; $id_label++; ?>"    class="labelStar" >★</label><!--
    --><input id="<?php echo 'radio'.$id_label; ?>"     type="radio" name="<?php echo $file->pregunta_id; ?>" value="3"><!--
    --><label name="<?php echo $file->pregunta_id; ?>"  for="<?php echo 'radio'.$id_label; $id_label++; ?>"    class="labelStar" >★</label><!--
    --><input id="<?php echo 'radio'.$id_label; ?>"     type="radio" name="<?php echo $file->pregunta_id; ?>" value="2"><!--
    --><label name="<?php echo $file->pregunta_id; ?>"  for="<?php echo 'radio'.$id_label; $id_label++; ?>"    class="labelStar" >★</label><!--
    --><input id="<?php echo 'radio'.$id_label; ?>"     type="radio" name="<?php echo $file->pregunta_id; ?>" value="1"><!--
    --><label name="<?php echo $file->pregunta_id; ?>"  for="<?php echo 'radio'.$id_label; $id_label++; ?>"   class="labelStar" >★</label>
    <hr>
  </p>
      <?php
    }//END IF TIPOpregunta_id = 2
    else
    {

      echo $style2;
      $display='style="display:block;"';
      $hr="<hr>";
      if($file->tipopregunta_id==4)
      {
        $display='style="display:none;"';
      }
       ?>
       <div class="labelStar" >
        <div class="col-sm-12 col-lg-12">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div  align ="center" class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-left animation-pullDown">
                       <label class="labelStar" id="<?php echo 'label'.$file->tipopregunta_id; ?>" <?php echo $display;?> ><?php echo utf8_encode($file->descripcion); ?></label><br>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
      </div>
      <?php 
      ?>
       <p  <?php echo $display;?> id="<?php echo 'panel'.$file->tipopregunta_id; ?>" >

       <input  id="<?php echo 'radio'.$id_label; ?>"   checked='true' type="radio" name="<?php echo $file->pregunta_id; ?>" value="1"><!--
    --><label  name="<?php echo $file->pregunta_id; ?>" for="<?php $ant='radio'.$id_label; $id_label++; echo $ant; ?>" onclick="Uncheck('<?php $id_label; echo 'radio'.$id_label; ?>','<?php echo $file->tipopregunta_id; ?>','1')"   class="labelStar">SI</label>

    <?php  ?>
        <input id="<?php echo 'radio'.$id_label; ?>" type="radio" name="<?php echo $file->pregunta_id.'X'; ?>" value="0"><!--
    --><label  name="<?php echo $file->pregunta_id.'X'; ?>"  for="<?php echo 'radio'.$id_label; $id_label++; ?>"  onclick="Uncheck('<?php echo $ant; ?>','<?php echo $file->tipopregunta_id; ?>','0')"  class="labelStar" >NO</label>
     <?php 
      if($file->tipopregunta_id==4)
      {
        #None
      }
      else
      {
        echo $hr;
      }
      ?>
  </p>
      <?php
    }//END ELSE TIPO = 2
  }//END WHILE

?>
<div>
   <textarea rows="4" cols="80"  name="Comentarios" placeholder="Comentarios del servicio" maxlength="350"></textarea>
    <br><br>
  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Calificar</button>
  </div>
  <input type="hidden" name ="ticketid" value="<?php echo $fila['id']; ?>">
</form>
<?php 
conectar(0);
?>
    <!-- IVAN END  ################################################################################################################################################-->
<?php
}
else
{
  ?>

                                <div class="widget-extra themed-background-dark">
                                    <div class="widget-options">
                                    </div>
                                    <h3 class="widget-content-light">
                                        <small><a href="#"><strong>La encuesta ya ha sido contestada</strong></a></small>
                                    </h3>
                                </div>
<?php
}
                }//END IF RESOLVED
                else
                {
?>

                                <div class="widget-extra themed-background-dark">
                                    <div class="widget-options">
                                    </div>
                                    <h3 class="widget-content-light">
                                        <small><a href="#"><strong>Este ticket aun sigue abierto</strong></a></small>
                                    </h3>
                                </div>
<?php

                }//END ELSE RESOLVED

?>    
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Advanced Gallery Widget -->
        </div>
    </div>
    <!-- END Widgets Row -->
</div>
<!-- END Page Content -->


<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>

<?php include 'inc/template_end.php'; ?>