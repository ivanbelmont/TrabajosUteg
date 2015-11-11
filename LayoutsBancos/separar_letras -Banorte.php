<?php $cadena="2048805295010173002878U10400000000000516000000000000N00000000000516200000000000107134152181015150543925338297                                                                                                                        000101014880145032A00020151022**22120720000000                                                       002878";
echo $cadena."<br><br>";
echo "Total Cadena".strlen($cadena)."<br><br>";
$num=strlen($cadena);
$unit=0;
$Conteo=1;
$pos=1;
For($a=0; $a<=$num; $a++){
//echo "[".$unit."]";

//echo " ( Posicion= ".$pos.") </b> ";#Posicion Caracter only
//echo " ( Posicion= ".$pos." <b> Carater ".$cadena[$a].") </b> ";#Posicion Caracter detalle
//echo " ( Posicion= ".$unit." <b> Carater ".$cadena[$a].") </b> ";#Posicion array
//echo "<label style='color:RED'> [".$Conteo."] </label>"; # Contar carateres
	echo "<b>".$cadena[$a]."</b> ";

if ($unit==0){
	$Conteo=0;
	echo "<br>TIPO REGISTRO<br><br>";}

if ($unit==21){
	$Conteo=0;
	echo "<br>FOLIO<br><br>";}

if ($unit==23) {
	$Conteo=0;
	echo "<br>MEDIO DE PAGO (U1 ventanilla, A1 cajero, I1 internet)<br><br>";}

if ($unit==25) {
	$Conteo=0;
	echo "<br>FORMA DE PAGO (si se habilira targeta de credito solo puede ser targeta banorte)<br><br>";}

if ($unit==41) {
	$Conteo=0;
	echo "<br>IMPORTE BRUTO<br><br>";}
if ($unit==51) {
	$Conteo=0;
	echo "<br>IMPORTE DE DESCUENTO O RECARGO<br><br>";}

if ($unit==52) {
	$Conteo=0;
	echo "<br>IDENTIFICADOR DE DESCUENTO<br><br>";}

if ($unit==68) {
	$Conteo=0;
	echo "<br>IMPORTE NETO<br><br>";}

if ($unit==108) {
	$Conteo=0;
	echo "<br>REFERENCIA<br><br>";}

if ($unit==148) {
	$Conteo=0;

	echo "<br>REFERENCIA 2<br><br>";}

if ($unit==188) {
	$Conteo=0;

	echo "<br>REFERENCIA 3<br><br>";}

if ($unit==228) {
	$Conteo=0;

	echo "<br>REFERENCIA 4<br><br>";}

if ($unit==236) {
	$Conteo=0;

	echo "<br>FECHA DE VENCIMIENTO<br><br>";}

if ($unit==240) {
	$Conteo=0;

	echo "<br>INFORMACION DE SUCURSAL (si el pago es por internet puede aparecer un 5021)<br><br>";}


if ($unit==246) {
	$Conteo=0;

	echo "<br>HORA<br><br>";}


if ($unit==247) {
	$Conteo=0;

	echo "<br>ESTATUS<br><br>";}

if ($unit==249) {
	$Conteo=0;

	echo "<br>CODIGO DE RECHAZO<br><br>";}

if ($unit==250) {
	$Conteo=0;

	echo "<br>CUENTA O TARGETA [Tipo de Movimiento]<br><br>";}

if ($unit==258) {
	$Conteo=0;

	echo "<br>FECHA DE PAGO<br><br>";}

if ($unit==264) {
	$Conteo=0;

	echo "<br>DESCRIPCION DE FORMA DE PAGO<br><br>";}

if ($unit==267) {
	$Conteo=0;

	echo "<br>CLAVE DEL BANCO<br><br>";}

if ($unit==274) {
	$Conteo=0;

	echo "<br>NUMERO DE CHEQUE<br><br>";}

if ($unit==329) {
	$Conteo=0;

	echo "<br>FILLER<br><br>";}

if ($unit==335) {
	$Conteo=0;

	echo "<br>NUMERO DE EMPRESA<br><br>";}
$unit+=1;
$Conteo+=1;
$pos+=1;
}
?>