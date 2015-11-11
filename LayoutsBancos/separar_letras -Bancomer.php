<?php $cadena="141015|EFE|359972|00000000000000000000|101089428141015124853825295297|1567|";
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