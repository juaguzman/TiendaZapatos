<?php

class Zapatos
{
    var $marca;
    var $modelo;
    var $cantidad;
    var $valor;
    var $sucursal_idsucursal;
    
    function Zapatos($marca, $modelo, $cantidad, $valor, $sucursal_idsucursal)
    {
        $this-> marca = $marca;
        $this-> modelo = $modelo;
        $this-> cantidad = $cantidad;
        $this-> valor = $valor;
        $this-> sucursal_idsucursal = $sucursal_idsucursal;        
    }
    
    static function insertarZapatos($marca, $modelo, $cantidad, $valor, $sucursal_idsucursal,$ur)
    {
        include '../conexi.php'; 
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $mensaje = "Resultados";
        
        $mod = $modelo;
        $marc = $marca;
        $cant = $cantidad;
        $val = $valor;
        $sucu = $sucursal_idsucursal;
        $url = $ur;
        
        
        $sql = "insert into zapatos(marca,modelo,cantidad,valor,sucursal_idsucursal) values ('$marc','$mod',$cant,$val,$sucu)";
              
        
         mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
         mysqli_close($mysqli);
         
          header('Location:../general/vista_zapatosGN');
       
    }
    
    public function lista_zapatos()
    {
        include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $consulta= "SELECT idzapatos, marca,modelo,cantidad,valor,sucursal_idsucursal, sucursal.nombre as 'sucursal' from zapatos, sucursal where sucursal_idsucursal = sucursal.idsucursal;";
        $result   = $mysqli->query($consulta);
         echo "<table border = '3' id=res > \n";
         echo "<tr align =center> <th colspan=7>Lista de Zapatos global</th> </tr>";
         echo "<tr align=center id=tit><td >&nbsp;ID_Zapatos&nbsp;</td><td>&nbsp;MARCA&nbsp;</td><td>&nbsp;MODELO&nbsp;</td><td>&nbsp;CANTIDAD&nbsp;</td><td>&nbsp;VALOR&nbsp;</td><td>&nbsp;SUCURSAL&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
         while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<tr id=resul><td>$campo->idzapatos</td><td>$campo->marca</td><td>$campo->modelo</td><td>$campo->cantidad</td><td>$campo->valor</td><td>$campo->sucursal</td><td><a href=../modelo/procesar_zapatos.php?req_zap=Eliminar&id=$campo->idzapatos ><img src=../img/eli.png width=25px heigt=25px /></a> "
                     . "&nbsp;&nbsp;&nbsp; <a href=../modelo/modificarZap.php?req_zap=Modificar&id=$campo->idzapatos><img src=../img/mod.png width=25px heigt=25px /></a></td> </tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
         
    }
    
    
    static function lista_zapatos_sucursal($sucursal)
    {
         include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $consulta= "select * from zapatos where zapatos.sucursal_idsucursal = $sucursal";
        $result   = $mysqli->query($consulta);
         echo "<table border = '3' class=datagrid > \n";
         echo "<tr align =center class=datagrid> <th colspan=6>Lista de Zapatos global</th> </tr>";
         echo "<tr align=center class=datagrid><td >&nbsp;ID_Zapatos&nbsp;</td><td>&nbsp;MARCA&nbsp;</td><td>&nbsp;MODELO&nbsp;</td><td>&nbsp;CANTIDAD&nbsp;</td><td>&nbsp;VALOR&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
         while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<tr class=datagrid><td>$campo->idzapatos</td><td>$campo->marca</td><td>$campo->modelo</td><td>$campo->cantidad</td><td>$campo->valor</td><td><a href=../modelo/procesar_zapatos.php?req_zap=Eliminar&id=".$campo->idzapatos.";><img src=../img/eli.png width=25px heigt=25px /></a> "
                     . "&nbsp;&nbsp;&nbsp; <a href=../modelo/modificarZap.php?req_zap=Modificar&id=$campo->idzapatos><img src=../img/mod.png width=25px heigt=25px /></a></tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
         
    }
    
    static function eliminar_zapatos($id)
    {
        include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $mensaje = "Resultados";
        
        //Insertar usuario en la BD  
       
        $sql = "DELETE FROM zapatos WHERE idzapatos=$id";
        
         mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
         mysqli_close($mysqli);
         
          header('Location:../general/vista_zapatosGN.php');
        
        return $mensaje;
    }
    
    static function editarZapatos($id,$marca, $modelo, $cantidad, $valor)
    {
        include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        
        
        if($id!=NULL || $marca!=NULL || $modelo!=NULL || $cantidad!=NULL || $valor!=NULL  )
        {
            $sql = "UPDATE zapatos SET marca='$marca',modelo='$modelo',cantidad=$cantidad ,valor=$valor WHERE idzapatos = $id;";
             mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
             mysqli_close($mysqli);
            header('Location:../general/vista_zapatosGN');
        }
        else
        {
            echo "Los campos deben estar completamente llenos";
        }
    }
    
     static function lista_zapatos_ventas($sucursal)
    {
         include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $consulta= "select * from zapatos where zapatos.sucursal_idsucursal = $sucursal";
        $result   = $mysqli->query($consulta);
         echo "<table border = '3' class=datagrid > \n";
         echo "<tr align =center class=datagrid> <th colspan=6>Lista de Zapatos global</th> </tr>";
         echo "<tr align=center class=datagrid><td >&nbsp;ID_Zapatos&nbsp;</td><td>&nbsp;MARCA&nbsp;</td><td>&nbsp;MODELO&nbsp;</td><td>&nbsp;CANTIDAD&nbsp;</td><td>&nbsp;VALOR&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
         while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<tr class=datagrid><td>$campo->idzapatos</td><td>$campo->marca</td><td>$campo->modelo</td><td>$campo->cantidad</td><td>$campo->valor</td><td><a href=../modelo/Vender.php?req_venta=vender&id=$campo->idzapatos&sucu=$sucursal><img src=../img/car.png width=25px heigt=25px /></a></tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
         
    }
    
    static function actualizar_venta($id,$cant)
    {
        
                
        
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        
       $sql = "UPDATE zapatos SET cantidad = cantidad-$cant WHERE idzapatos =$id";
       mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
       mysqli_close($mysqli);
      
       
    }
}
