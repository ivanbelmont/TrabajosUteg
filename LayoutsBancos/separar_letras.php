<?php $cadena="65502426295     11042015143778610000DEP EN EFECTIV                          +000000001567000000001438142508615089101121702031115173948525495260          ";
echo $cadena."<br><br>";
echo "Total Cadena".strlen($cadena)."<br><br>";
$num=strlen($cadena);
$unit=0;
$Conteo=1;
For($a=0; $a<=$num; $a++){
//echo "[".$unit."] <b>".$cadena[$a]."</b> ";
//echo "[".$unit."]";
//echo "<label style='color:RED'>".$Conteo." </label>";
	echo "<b>".$cadena[$a]."</b> ";
if ($unit==15){
	$Conteo=0;
	echo "<br>NUMERO DE CUENTA<br><br>";}

if ($unit==23) {
	$Conteo=0;
	echo "<br>FECHA DEL MOVIMIENTO<br><br>";}

if ($unit==27) {
	$Conteo=0;
	echo "<br>HORA DEL MOVIMIENTO<br><br>";}

if ($unit==31) {
	$Conteo=0;
	echo "<br>SUCURSAL DEL MOVIMIENTO<br><br>";}
if ($unit==35) {
	$Conteo=0;
	echo "<br>CLACON DE OPERACION<br><br>";}

if ($unit==75) {
	$Conteo=0;
	echo "<br>DESCRIPCION DEL MOVIMIENTO<br><br>";}

if ($unit==76) {
	$Conteo=0;
	echo "<br>SIGNO DE LA OPERACION<br><br>";}

if ($unit==90) {
	$Conteo=0;
	echo "<br>IMPORTE DEL MOVIMIENTO<br><br>";}

if ($unit==104) {
	$Conteo=0;

	echo "<br>SALDO DEL MOVIMIENTO<br><br>";}

if ($unit==112) {
	$Conteo=0;

	echo "<br>REFERENCIA DEL MOVIMIENTO<br><br>";}

if ($unit==152) 
	echo "<br>REFERENCIA INTERBANCARIA<br><br>";


$unit+=1;
$Conteo+=1;
}
?>