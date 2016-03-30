<!DOCTYPE html>
<html>
    <head profile='http://uteg.edu.mx' >
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Envio EmailSencillo</title>
        <div  align="center" style="position: absolute; margin-left: 1%; margin-top: 0%;">
   

    <img style="position: absolute; margin-left: 700px; margin-top: 650px;" src="images/correo.PNG">
        <style type="text/css" media="screen">
            #body
            {
                font-family: Arial,sans-serif; color: buttonshadow;
                background-color: activeborder; margin-top: 1%;
            }
            ::-webkit-input-placeholder { color:#fff; }
            ::-moz-placeholder { color:#fff; } /* firefox 19+ */
            :-ms-input-placeholder { color:#fff; } /* ie */
            input:-moz-placeholder { color:#fff; }
            
        </style>
        
    </head>
      <body background='images/back.jpg'>
        <form action="envio_el_mail.php" method="post">
            <div style="position: absolute; margin-left: 700px; margin-top: 700px;">
                <p><input style="background-color: #C8C8C8;" placeholder="Nombre" type="text" name="nombre" size="25" required/></p>
               <p><input style="background-color: #C8C8C8;" type="tel" placeholder="Telefono" name="empre" size="25" required/></p>
               <p><input style="background-color: #C8C8C8;" type="email" placeholder="E-mail" name="email" size="25" required/></p>
                <br>
                
                <p><label><textarea style="background-color: #C8C8C8;" placeholder="Comentarios" maxlength="50" name='texto'cols='32' rows="6" ></textarea></label></p>
                
                <input type="submit" value="enviar">
            </div>
        </form>
       </div>
    </body>
</html>
