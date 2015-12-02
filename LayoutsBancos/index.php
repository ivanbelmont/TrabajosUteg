
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Creacion de Layouts</title></head>

<script type="text/javascript" language="javascript">
function CambiarAction (opc) 
{
var option=opc;


switch (option)

{
		case 0:

document.forms.formulario.action= "redirect.php";	
document.getElementById("IMAGE").src = "IMG/default.png";
	break;


		case 1:

document.forms.formulario.action= "bancomer2.php";	
document.getElementById('IMAGE').src = "IMG/logo-bbva.jpg";

	break;

	case 2:

document.forms.formulario.action= "banorte.php";	
document.getElementById('IMAGE').src = "IMG/logo_banorte.png";
	break;
}

}

</script>
<body>
 <form name="formulario" action="redirect.php" method="post" enctype="multipart/form-data"> 
	<h1>Sistema de Creacion Layouts</h1>
	<img src="IMG/default.png" id="IMAGE" name="IMG"><br><br>
<select value="BANCO">
<option href="#" onclick="javascript:CambiarAction(0);return false;" value="0">Seleciona un Banco</option>
<option href="#" onclick="javascript:CambiarAction(1);return false;" value="bancomer">Bancomer</option>
<option href="#" onclick="javascript:CambiarAction(2);return false;" value="banorte">Banorte</option>
</select>	
<br><br><input required type="file" name="archivo"><br><br>

<input type="submit" value="subir">
</form>
</body>
</html>