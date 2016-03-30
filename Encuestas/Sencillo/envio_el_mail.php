<?php
    require './class.phpmailer.php';
    require 'class.smtp.php';
    require './index.php';
    $e_mail="example@uteg.edu.mx";
    $id=$_POST['nombre'];
    
$fecha=  date("d-m-y");
$hora=  date("H: i: s");

if(isset($_POST['texto']))
{

   $Comentario="<br>Comentario de parte del usuario: ".$_POST['texto'];
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
   $mail->Password   = "password";
   $mail -> Body ="Buen dia  <b>Saira Nuñez</b> <br> <b>El ticket#".$id."</b>  ha sido calificado como <b>no solucionado</b>. ".$Comentario." <br> para mas informacion en el siguiente <a href='https://rt.uteg.edu.mx/Ticket/Display.html?id=".$id."'>Enlace</a>";
   $mail->IsHTML(TRUE);
    
    //====== DE QUIEN ES ========
    $mail->From       = $e_mail;
    $mail->FromName   = "Sistema RT UTEG";//nombre de quien envia
    //$mail->AddAttachment("images/foto.jpg", "uteg.jpg"); //Archivo adjunto
    $mail->AddAttachment("images/img_envio.jpg","Sistema RT UTEG.jpg"); //Archivo adjunto
    //====== PARA QUIEN =========
    $mail->Subject    = "Informacion del ticket#".$id;
    $mail->AddAddress("mario.rodriguez@uteg.edu.mx","Para Admin");
	if($mail->Send()) {


        ?>
            <SCRIPT LANGUAGE="javascript">
                alert('Su mensaje se ha enviado satisfactoriamente');
			location.href = "index.php";
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