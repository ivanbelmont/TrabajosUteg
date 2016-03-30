<?php 
include 'conexion.php';
require './class.phpmailer.php';
require 'class.smtp.php';
conectar(1);

$numero2 = count($_POST);
$tags2 = array_keys($_POST); // obtiene los nombres de las varibles
$valores2 = array_values($_POST);// obtiene los valores de las varibles



$Comentarios=$_POST['Comentarios'];
$Ticket_id=$_POST['ticketid'];

//echo $Comentarios." ".$Ticket_id;
 
$fecha=date("Y-m-d h:m:s");

$sql_insert="INSERT INTO Uteg_Encuesta (encuesta_id,ticket_id,comentario,fecha) VALUES (null,".$Ticket_id.",'".$Comentarios."','".$fecha."')";
//echo $sql_insert;
mysql_query($sql_insert) or die (mysql_error()."<br>".$sql_insert);

$afectado=mysql_affected_rows();
if($afectado>=1)
{
//echo "Insertado con exito";
	// crea las variables y les asigna el valor

$sql_id="SELECT MAX(encuesta_id) FROM Uteg_Encuesta;";
$id=mysql_query($sql_id) or die (mysql_error()."<br>".$sql_id);

$id_enc=mysql_fetch_array($id);

echo $id_enc[0];

for($i=0;$i<$numero2;$i++)
{ 



$tipo=str_replace('X','',$tags2[$i]);

IF ($tipo!='Comentarios')
{
	IF ($tipo!='ticketid')
{
	//echo 
	$sql_insert_Det="INSERT INTO Uteg_EncuestaDetalle (encuestadetalle_id,encuesta_id,pregunta_id,valor) VALUES (null,".$id_enc[0].",".str_replace('X','',$tags2[$i]).",".$valores2[$i].")";
	mysql_query($sql_insert_Det) or die (mysql_error()."<br>".$sql_insert_Det);
	//echo "<br>";
}
	//echo "No hacer nada Comentarios";
}


//echo "PREGUNTA ID=".str_replace('X','',$tags2[$i])."<br>";
//echo "CALIFICACION=".$valores2[$i]."<br>";
$id=$id_enc[0];
$email=str_replace('X','',$tags2[$i]).$valores2[$i];

if($email=='30')
{

$sql_email="SELECT t.id,u.RealName Creado_Por, t.Subject,TRUNCATE((t.TimeWorked/60),0)Horas_invertidas,
t.Created creado,t.Resolved Resuelto,datediff(t.Resolved , t.Created) dias_Resolucion,
(SELECT us.RealName FROM rt4.Users us WHERE us.id=t.LastUpdatedBy) Cerro,t.Status
FROM rt4.Tickets t,rt4.Users u
WHERE u.id = t.Creator
AND t.id=".$Ticket_id;
$inf=mysql_query($sql_email) or die (mysql_error()."<br>".$sql_email);

$inf_enc=mysql_fetch_array($inf);


$Creado_Por=$inf_enc['Creado_Por'];
$Subject=$inf_enc['Subject'];
$Cerro=$inf_enc['Cerro'];


	  $mail             = new PHPMailer();
   $mail->IsSMTP();
   $mail->SMTPAuth   = true;
   $mail->Port       = 465;
   $mail->Host       = "ssl://smtp.gmail.com";
   $mail->Username   = 'example.edu.mx';
   $mail->Password   = "example";
   $mail -> Body ="Buen dia  <b>Saira Nuñez</b> <br> <b>El ticket#".$Ticket_id."</b>  ha sido calificado como <b>no solucionado</b><br>Informacion<br><b>Creado por:</b> ".$Creado_Por."<br><b>Asunto :</b>".$Subject."<br><b>Cerrado por: </b>".$Cerro."<br><b>Comentarios: </b>".$Comentarios." <br> para mas informacion en el siguiente <a href='https://rt.uteg.edu.mx/Ticket/Display.html?id=".$Ticket_id."'>Enlace</a>";
   $mail->IsHTML(TRUE);
    
    //====== DE QUIEN ES ========
    $mail->From       = $e_mail;
    $mail->FromName   = "Sistema RT UTEG";//nombre de quien envia
    //$mail->AddAttachment("images/foto.jpg", "uteg.jpg"); //Archivo adjunto
    $mail->AddAttachment("images/img_envio.jpg","Sistema RT UTEG.jpg"); //Archivo adjunto
    //====== PARA QUIEN =========
    $mail->Subject    = "Informacion del ticket#".$Ticket_id;
    $mail->AddAddress("example@uteg.edu.mx","Informacion RT");
	if($mail->Send()) {
		echo "Se envio correo para verificacion";
	}
		else{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
	//echo "Se envia Email";
}

}
?>
<SCRIPT TYPE="text/javascript">
var id = "<?php echo $Ticket_id; ?>";
alert("La encuesta ha sido contestada");
location.href="index.php?id="+id;
</SCRIPT>
<?php
}
else
{
?>
<SCRIPT TYPE="text/javascript">
var id = "<?php echo $Ticket_id; ?>";
alert("No se contesto la encuesta, favor de intentarlo mas tarde");
location.href="index.php?id="+id;
</SCRIPT>
<?php
//echo "Error en la insersion";
}




conectar(0);

?>