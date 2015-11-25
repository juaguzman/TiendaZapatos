<?php

class Ventas
{
    var  $fecha;
    var  $valor_total;
    var  $nomcomprador;
    var  $cedulacomprador;
    var  $vendedor_cedula;
    var  $zapatos_idzapatos;
    
    function Vendedor($fecha,$valor_total,$nomcomprador,$cedulacomprador,$vendedor_cedula,$zapatos_idzapatos)
    {
        $this -> fecha = $fecha;
        $this -> valor_total = $valor_total;
        $this-> nomcomprador = $nomcomprador;
        $this -> vendedor_cedula = $vendedor_cedula;
        $this-> zapatos_idzapatos = $zapatos_idzapatos;
    }
    
    static function insertarVenta($fecha,$valor_total,$nomcomprador,$cedulacomprador,$vendedor_cedula,$zapatos_idzapatos)
    {
        include '../conexi.php'; 
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $mensaje = "Resultado";
        
        $sql = "INSERT INTO venta(fecha,valor_total,nomcomprador,cedulacomprador,vendedor_cedula,zapatos_idzapatos) values ('$fecha',$valor_total,'$nomcomprador',$cedulacomprador,$vendedor_cedula,$zapatos_idzapatos";
         mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
         mysqli_close($mysqli);
         
          header('Location:../general/ventasG.php');
    }
    

static function listar_ventas()
{
    include '../conexi.php';
    $mysql = new conexion();
    $mysqli=$mysql->conctar();
    $consulta ="SELECT idfactura, fecha, valor_total, nomcomprador, cedulacomprador, vendedor_cedula, zapatos_idzapatos as 'idzapatos', zapatos.marca as 'marca', zapatos.modelo as 'modelo', zapatos.valor as 'valorUnid', vendedor.nombres as 'vendedor', sucursal.nombre as 'sucursal' FROM zapatos, venta, vendedor, sucursal WHERE zapatos.idzapatos = venta.zapatos_idzapatos AND vendedor.cedula = venta.vendedor_cedula AND sucursal.idsucursal = vendedor.sucursal_idsucursal";
    $result = $mysqli->query($consulta);
     echo "<table border = '3' id=res > \n";
     echo "<tr align =center> <th colspan=7>Lista de Ventas Global</th> </tr>";
     echo "<tr align=center id=tit><td >&nbsp;Factura #&nbsp;</td><td>&nbsp;Fecha&nbsp;</td><td>&nbsp;Comprador&nbsp;</td><td>&nbsp;Cedula&nbsp;</td><td>&nbsp;Vendedor&nbsp;</td><td>&nbsp;Cedula vend&nbsp;</td><td>&nbsp;ID Producto&nbsp;</td>"
     . "<td>&nbsp;Marca&nbsp;</td><td>&nbsp;Modelo&nbsp;</td><td>&nbsp;Valor Unid&nbsp;</td><td>&nbsp;Valor Total&nbsp;</td><td>&nbsp;Sucursal&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
      while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<tr id=resul><td>$campo->idfactura</td><td>$campo->fecha</td><td>$campo->nomcomprador</td><td>$campo->cedulacomprador</td><td>$campo->vendedor</td><td>$campo->vendedor_cedula</td><td>$campo->idzapatos</td>"
                     . "<td>$campo->marca</td><td>$campo->modelo</td><td>$campo->valorUnid</td><td>$campo->valor_total</td><td>$campo->sucursal</td><td><a href=../modelo/procesar_zapatos.php?req_zap=Eliminar&id=".$campo->idfactura.";>Elminar</a><a>Modificar</a> </tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
     
}

static function listar_ventas_sucursal($sucursal)
{
    include '../conexi.php';
    $mysql = new conexion();
    $mysqli=$mysql->conctar();
    $consulta ="SELECT idfactura, fecha, valor_total, nomcomprador, cedulacomprador, vendedor_cedula, zapatos_idzapatos as 'idzapatos', zapatos.marca as 'marca', zapatos.modelo as 'modelo', zapatos.valor as 'calorUnid', vendedor.nombres as 'vendedor'"
            . ", sucursal.nombre as 'sucursal' FROM zapatos, venta, vendedor, sucursal WHERE zapatos.idzapatos = venta.zapatos_idzapatos AND vendedor.cedula = venta.vendedor_cedula AND sucursal.idsucursal = vendedor.sucursal_idsucursal AND idsucursal = $sucursal";
    $result = $mysqli->query($consulta);
     echo "<table border = '3' id=res > \n";
     echo "<tr align =center> <th colspan=7>Lista de Ventas Global</th> </tr>";
     echo "<tr align=center id=tit><td >&nbsp;Factura #&nbsp;</td><td>&nbsp;Fecha&nbsp;</td><td>&nbsp;Comprador&nbsp;</td><td>&nbsp;Cedula&nbsp;</td><td>&nbsp;Vendedor&nbsp;</td><td>&nbsp;Cedula vend&nbsp;</td><td>&nbsp;ID Producto&nbsp;</td>"
     . "<td>&nbsp;Marca&nbsp;</td><td>&nbsp;Modelo&nbsp;</td><td>&nbsp;Valor Unid&nbsp;</td><td>&nbsp;Valor Total&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
      while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<tr id=resul><td>$campo->idfactura</td><td>$campo->fecha</td><td>$campo->nomcomprador</td><td>$campo->cedulaComprador</td><td>$campo->vendedor</td><td>$campo->vendedor_cedula</td><td>$campo->idzapatos</td>"
                     . "<td>$campo->marca</td><td>$campo->modelo</td><td>$campo->valoUnid</td><td>$campo->valor_total</td><td><a href=../modelo/procesar_zapatos.php?req_zap=Eliminar&id=".$campo->idfactura.";>Elminar</a><a>Modificar</a> </tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
     
}

static function eliminar_factura($id)
{
    include '../conexi.php';
    $mysql = new conexion();
    $mysqli=$mysql->conctar();
    $mensaje="Resultado";
    
    $sql = @mysql_query("Delete FROM venta WHERE idfactura = $id");
    mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
    mysqli_close($mysqli);
    header('Location:../general/ventasG.php');


}
}
