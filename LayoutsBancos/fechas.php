<?php 

$Fechas=['10115','11115','12115','13115','14115','15115','16115','17115','18115','19115','20115',
'21115','22115','23115','24115','25115','26115','27115','28115','29115','30115','31115','10215','11215',
'12215','13215','14215','15215','16215','17215','18215','19215','20215','21215','22215','23215',
'24215','25215','26215','27215','28215','10315','11315','12315','13315','14315','15315','16315',
'17315','18315','19315','20315','21315','22315','23315','24315','25315','26315','27315','28315',
'29315','30315','31315','10415','11415','12415','13415','14415','15415','16415','17415','18415',
'19415','20415','21415','22415','23415','24415','25415','26415','27415','28415','29415','30415',
'10515','11515','12515','13515','14515','15515','16515','17515','18515','19515','20515','21515',
'22515','23515','24515','25515','26515','27515','28515','29515','30515','31515','10615','11615',
'12615','13615','14615','15615','16615','17615','18615','19615','20615','21615','22615','23615',
'24615','25615','26615','27615','28615','29615','30615','10715','11715','12715','13715','14715',
'15715','16715','17715','18715','19715','20715','21715','22715','23715','24715','25715','26715',
'27715','28715','29715','30715','31715','10815','11815','12815','13815','14815','15815','16815',
'17815','18815','19815','20815','21815','22815','23815','24815','25815','26815','27815','28815',
'29815','30815','31815','10915','11915','12915','13915','14915','15915','16915','17915','18915',
'19915','20915','21915','22915','23915','24915','25915','26915','27915','28915','29915','30915',
'11015','21015','31015','41015','51015','61015','71015','81015','91015','11115','21115','31115',
'41115','51115','61115','71115','81115','91115','11215','21215','31215','41215','51215','61215',
'71215','81215','91215'];

//echo count($Fechas);
$annio = date("Y");
for ($i=0; $i <count($Fechas) ; $i++) 
{ 
	$Fechas[$i];
	$cantidad_x_grupo=1;
	 $texto=$Fechas[$i]; 
                    $cantidad_x_grupo=1;
                     $lista = str_split($texto,$cantidad_x_grupo); 
                         $var =$lista[0];
                         $var2=$lista[1];
                         $var3=$lista[2];
                         $var4=$lista[3];
                         $var5=$lista[4];

                         $final=$var.$var2."-0".$var3."-".$annio;
if (
  $final=='11-01-2015'  || $final== '21-01-2015' || 
  $final == '31-01-2015'|| $final == '11-02-2015'|| 
  $final == '21-02-2015' ) {

	//echo "<br> COFLICTO EN".$final."<br><br>";
    $actualFech=date('d-m-Y');
    //echo "<b>".$actualFech."</b>";
    $FechaRestDay=strtotime('-15 day',strtotime ($actualFech ));
    $FechaRestDay = date ( 'd-m-Y' , $FechaRestDay );
    //echo " <b>".$FechaRestDay."</b>";



    if (check_in_range($FechaRestDay,$actualFech,$final)) {
    	 $final=$var.$var2."-0".$var3."-".$annio;
    }//END IF check_in_range
    else
    {
    	$final="0".$var."-".$var2.$var3."-".$annio;
    } //END ELSE check_in_range
}//END IF CONFLICTO

else
{

		if( check_in_range('01-01-'.$annio, '30-09-'.$annio,$final) )
		{
		$final=$var.$var2."-0".$var3."-".$annio;
		//$final." FORMATO CORRECTO</b><br>";
		//echo "Dentro de rango ";

		} //END IF check_in_range
		else {
		$final="0".$var."-".$var2.$var3."-".$annio;
		//$final."<label style='color:RED; '> FORMANO INCORRECTO <label></b><br>";
		//echo "Fuera de rango ";

		} //END ELSE check_in_range
	
} //ELSE CONFLICTO

//echo $final."<br>";

}




 function formatfechcorrect($Fechas)
 {
 	$annio = date("Y");
//$Fechas[$i];
	$cantidad_x_grupo=1;
	 //$texto=$Fechas[$i]; 
	  $texto=$Fechas; 
                    $cantidad_x_grupo=1;
                     $lista = str_split($texto,$cantidad_x_grupo); 
                         $var =$lista[0];
                         $var2=$lista[1];
                         $var3=$lista[2];
                         $var4=$lista[3];
                         $var5=$lista[4];

                         $final=$var.$var2."-0".$var3."-".$annio;
if (
  $final=='11-01-2015'  || $final== '21-01-2015' || 
  $final == '31-01-2015'|| $final == '11-02-2015'|| 
  $final == '21-02-2015' ) {
    $actualFech=date('d-m-Y');
    //$actualFech='22-02-2015';//PRUEBA
    //echo "<b>".$actualFech."</b>";
    $FechaRestDay=strtotime('-15 day',strtotime ($actualFech ));
    $FechaRestDay = date ('d-m-Y', $FechaRestDay);
    //echo " <b>".$FechaRestDay."</b>";



    if (check_in_range($FechaRestDay,$actualFech,$final)) {
    	 $final=$var.$var2."-0".$var3."-".$annio;
    }//END IF check_in_range
    else
    {
    	$final="0".$var."-".$var2.$var3."-".$annio;
    } //END ELSE check_in_range
}//END IF CONFLICTO

else
{

		if( check_in_range('01-01-'.$annio, '30-09-'.$annio,$final) )
		{
		$final=$var.$var2."-0".$var3."-".$annio;
		//$final." FORMATO CORRECTO</b><br>";
		//echo "Dentro de rango ";

		} //END IF check_in_range
		else {
		$final="0".$var."-".$var2.$var3."-".$annio;
		//$final."<label style='color:RED; '> FORMANO INCORRECTO <label></b><br>";
		//echo "Fuera de rango ";

		} //END ELSE check_in_range
	
} //ELSE CONFLICTO

echo $final;
 }//END formatfechcorrect

 function check_in_range($start_date, $end_date, $evaluame)
 { 
 $start_ts = strtotime($start_date);
 $end_ts = strtotime($end_date);
 $user_ts = strtotime($evaluame);
 return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
 }

 echo formatfechcorrect('71015'); 

?>