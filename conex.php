<?php

/* /**
 * conexion a la base de datos 
 */
 $server = "localhost";
 $user_name="root";
 $password="mysql";
 $db = 'zapateria';
 $con=  mysql_connect($server,$user_name,$password)or die("No se ha podido establecer la conexion");
 $sdb=  mysql_select_db($db,$con)or die("La base de datos no existe");
?>

