<?php
    function conectar($conectar) 
    { 
        $link=''; 
        if($conectar == 1) 
        { 
            $link = mysql_connect('localhost','root','') 
            or die('No se pudo conectar a la base de datos.'); 
            mysql_select_db('pruebasuteg') 
            or die('Error al tratar de selecccionar la base.'); 
            if($link){} 
        } 
        if($conectar == 0) 
        { 
            $link = mysql_connect('localhost','root',''); 
            mysql_close($link); 
            
        } 
    } 
?> 