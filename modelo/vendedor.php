<?php

class Vendedor
{
    
    var $cedula;
    var $nombres;
    var $apellidos;
    var $fecha_nacimiento;
    var $sucursal_idsucursal;
    
     function Vendedor($cedula,$nombres,$apellidos,$fecha_nacimiento,$sucursal_idsucursal)
    {
        $this-> cedula = $cedula;
        $this-> nombres = $nombres;
        $this-> apellidos = $apellidos;
        $this-> fecha_nacimiento = $fecha_nacimiento;   
        $this-> sucursal_idsucursal = $sucursal_idsucursal;  
    }
    
    
      static function insertarvendedor($cedula,$nombres,$apellidos,$fecha_nacimiento,$sucursal_idsucursal)
    {
        include '../conex.php';
        $mensaje = "Resultados";
        
        $sql = @mysql_query("INSERT INTO vendedor(cedula,nombres,apellidos,fecha_nacimiento,sucursal_idsucursal) values ($cedula, '$nombres', '$apellidos', '$fecha_nacimiento', $sucursal_idsucursal)");
                
        if (!$sql) 
            {
            $mensaje.="Error Insertando vendedor en la base de datos: " . mysql_error();
            } 
        else 
            {
            $mensaje.="el vendedor con nombre: " . $nombres . " fue agregado al sistema";
            }
        return $mensaje;
    }
    
    public function lista_vendedores()
    {
       include '../conexi.php';
        $mysql = new conexion(); 
        $mysqli=$mysql->conctar();
        $consulta= "SELECT cedula,nombres,apellidos,fecha_nacimiento,sucursal_idsucursal as 'id_s', sucursal.nombre as 'sucursal' from vendedor, sucursal where sucursal_idsucursal = sucursal.idsucursal;";
        $result   = $mysqli->query($consulta);
        echo "<table border = '3' id=res > \n";
         echo "<tr align =center> <th colspan=6>Lista de Vendedores Global</th> </tr>";
          echo "<tr align=center id=tit><td >&nbsp;Cedula&nbsp;</td><td>&nbsp;Nombres&nbsp;</td><td>&nbsp;Apellidos&nbsp;</td><td>&nbsp;Fecha Nacimiento&nbsp;</td><td>&nbsp;Sucursal&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
           while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<tr id=resul><td>$campo->cedula</td><td>$campo->nombres</td><td>$campo->apellidos</td><td>$campo->fecha_nacimiento</td><td>$campo->sucursal</td><td><a href=./modelo/procesar_vendedor.php?req_zap=Eliminar&id=".$campo->cedula.";>Elminar</a><a>Modificar</a></td></tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
    }
    
     public function lista_vendedores_sucursal($sucursal)
    {
       include '../conexi.php';
        $mysql = new conexion(); 
        $mysqli=$mysql->conctar();
        $consulta= "select * from vendedor where vendedor.sucursal_idsucursal =$sucursal";
        $result   = $mysqli->query($consulta);
        echo "<table border = '3' id=res > \n";
         echo "<tr align =center> <th colspan=5>Lista de Vendedores Global</th> </tr>";
          echo "<tr align=center id=tit><td >&nbsp;Cedula&nbsp;</td><td>&nbsp;Nombres&nbsp;</td><td>&nbsp;Apellidos&nbsp;</td><td>&nbsp;Fecha Nacimiento&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
           while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<tr id=resul><td>$campo->cedula</td><td>$campo->nombres</td><td>$campo->apellidos</td><td>$campo->fecha_nacimiento</td><td><a href=./modelo/procesar_vendedor.php?req_zap=Eliminar&id=".$campo->cedula.";>Elminar</a><a>Modificar</a></td></tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
    }
    
    static function elminiar_vendedor($id)
    {
        include '../conex.php';
        $mensaje = "resultados:";
        
        $sql = @mysql_query("DELETE FROM vendedor WHERE cedula =$id");
        if (!$sql) {
            $mensaje.="Error Eliminando al vendedor en la base de datos: " . mysql_error();
        } else {
            $mensaje.="el vendedor con identificacion " . $id . " fue eliminados del sistema";
            
        }
        
        return $mensaje;
    }
    
    static function editarVendedor($id ,$nombres,$apellidos,$fecha_nacimiento,$sucursal_idsucursal)
    {
      if( $id!=NULL || $nombres!=NULL || $apellidos!=NULL || $fecha_nacimiento!=NULL || $sucursal_idsucursal!=NULL)
      {
        $sql = "UPDATE vendedor SET nombres='$nombre',apellidos='$apellidos',fecha_nacimiento='$fecha' WhERE cedula =$id";  
        mysql_query($sql);
       header('Location:../index.php');
      }
       else
        {
            echo "Los campos deben estar completamente llenos";
        }
    }
    
    
}
