<html>
    <head>
        <title>Reportes Moodle</title>
    </head>
    <body>
        <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    
<div style="width: 730px; margin: 20px auto; font-family:sans-serif;">
<?php
/** Include class */
include( 'GoogChart.class.php' );
include './conexion.php';
conectar(1);
$sqlname="SELECT * FROM graficas order by puntos";
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
			'#99C754',
			'#54C7C5',
			'#000000',
		);

/* # Chart 1 # */

$chart->setChartAttrs( array(
	'type' => 'pie',
	'title' => 'Tickets Vencidos',
	'data' => $data,
	'size' => array( 400, 300 ),
	'color' => $color
	));
// Print chart
echo $chart;

?>
</div>
        </body>
</html>