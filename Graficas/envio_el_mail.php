<?php
    require './class.phpmailer.php';
    require 'class.smtp.php';
    //require './index.php';
    $e_mail="example.edu.mx";
    $id=1;//$_POST['nombre'];

?>
<div style="width: 730px; margin: 20px auto; font-family:sans-serif;">
<?php
/** Include class */
include( 'GoogChart.class.php' );
include './conexion.php';
conectar(1);
$sqlname="SELECT * FROM graficas order by puntos DESC";
$name= mysql_query($sqlname);
$data = array();
$i = 0;
?>
    <table border="1">
        <tr>
            <td>Curso</td>
            <td>Alumnos Incritos</td>
        </tr>
        
    <?php
while($registro = mysql_fetch_array($name, MYSQL_BOTH)){
    $hits=$registro['puntos'];
    
     $data[utf8_encode($registro['nombre'])] = $hits;
     $i++ ;
     ?><tr> <td><?php echo utf8_encode($registro['nombre']);?> </td><?php
     ?> <td align="center"><?php echo $registro['puntos'];?> </td><?php
}
?>
        </tr>
        </table>
<pre>
<?php
  //print_r($data);
?>
</pre>
    <?php
/** Create chart */
$chart = new GoogChart();



// Set graph colors
$color = array(
      '#5F04B4',
      '#01DFA5',
      '#FFFF00',
      '#FF0000',
      '#0000FF',

    );

/* # Chart 1 # */

$chart->setChartAttrs( array(
  'type' => 'pie',
  'title' => '14/10/2015',
  'data' => $data,
  'size' => array( 400, 300 ),
  'color' => $color
  ));
// Print chart
echo $chart;



$image1='<img style="-webkit-user-select: none" 
src="http://chart.apis.google.com/
chart?cht=p3&amp;
chd=t:100,40,80,10&amp;
chco=FF0000,00FF00,0000FF&amp;
chs=500x220&amp;
chl=Hombres|Mujeres|Indefinido|Definido">';

$image2='<img style="-webkit-user-select: none" 
src="http://chart.apis.google.com/
chart?cht=v&amp;
chd=t:100,40,80,10&amp;
chco=FF0000,00FF00,0000FF&amp;
chs=500x220&amp;
chl=Hombres|Mujeres|Indefinido|Definido">';

$image3='<img style="-webkit-user-select: none" 
src="http://chart.apis.google.com/
chart?cht=bvs&amp;
chd=t:100,40,80,10&amp;
chco=FF0000|00FF00|0000FF&amp;
chs=500x220&amp;
chl=Hombres|Mujeres|Indefinido|Definido">';

    
$fecha=  date("d-m-y");
$hora=  date("H: i: s");

if(isset($_POST['texto']))
{

   $Comentario="<br>Comentario de parte del nombre: ".$_POST['texto'];
}
else
{
  $Comentario=" Sin comentarios";

}

//echo $fecha.$hora;
    try {

   $mail             = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->Port       = 465;
    $mail->Host       = "ssl://smtp.gmail.com";
    $mail->Username   = 'example@gmail.com';
   $mail->Password   = "pass";
   $mail -> Body ="Buen dia  <b>Saira Nuñez</b> <br> <b>El ticket#".$id."</b>  ha sido calificado como <b>no solucionado</b>. ".$Comentario." <br> para mas informacion en el siguiente <a href='https://rt.uteg.edu.mx/Ticket/Display.html?id=".$id."'>Enlace</a>".
   $chart."<br>".$image1."<br>".$image2."<br>".$image3;
   $mail->IsHTML(TRUE);
    
    //====== DE QUIEN ES ========
    $mail->From       = $e_mail;
    $mail->FromName   = "Sistema RT UTEG";//nombre de quien envia
    //$mail->AddAttachment("images/foto.jpg", "uteg.jpg"); //Archivo adjunto
    $mail->AddAttachment("images/img_envio.jpg","Sistema RT UTEG.jpg"); //Archivo adjunto
    //====== PARA QUIEN =========
    $mail->Subject    = "Informacion del ticket#".$id;
   $mail->AddAddress("example.edu.mx","Para Admin");
	if($mail->Send()) {


        ?>
            <SCRIPT LANGUAGE="javascript">
                alert('Su mensaje se ha enviado satisfactoriamente');

			</SCRIPT>
            <?php
	} else {
        echo "Mailer Error: " . $mail->ErrorInfo;
	
}
    } catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
        ?>    <SCRIPT LANGUAGE="javascript">
              //  alert('No se ha podido enviar su mensaje, favor de intentarlo mas tarde');
			//location.href = "index.php";
			</SCRIPT>
            <?php
	
?>