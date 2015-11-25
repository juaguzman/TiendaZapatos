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
        include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $mensaje = "Resultados";
        
        $sql = "INSERT INTO vendedor(cedula,nombres,apellidos,fecha_nacimiento,sucursal_idsucursal) values ($cedula, '$nombres', '$apellidos', '$fecha_nacimiento', $sucursal_idsucursal)";
          mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
         mysqli_close($mysqli);      
       
         header('Location:../general/vendedorG.php');
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
             echo "<tr id=resul><td>$campo->cedula</td><td>$campo->nombres</td><td>$campo->apellidos</td><td>$campo->fecha_nacimiento</td><td>$campo->sucursal</td><td><a href=../modelo/procesar_vendedor.php?req_vende=Eliminar&id=".$campo->cedula.";><img src=../img/eli.png width=25px heigt=25px /></a>&nbsp;&nbsp;&nbsp; <a href=../modelo/modificarVend.php?req_vende=Modificar&id=$campo->cedula><img src=../img/mod.png width=25px heigt=25px /></a></td></tr> \n";
             
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
             echo "<tr id=resul><td>$campo->cedula</td><td>$campo->nombres</td><td>$campo->apellidos</td><td>$campo->fecha_nacimiento</td><td><a href=../modelo/procesar_vendedor.php?req_vende=Eliminar&id=".$campo->cedula.";><img src=../img/eli.png width=25px heigt=25px /></a>&nbsp;&nbsp;&nbsp;<a href=../modelo/modificarVend.php?req_vende=Modificar&id=$campo->cedula><img src=../img/mod.png width=25px heigt=25px /></a></td></tr> \n";
                }
                 echo "</table> \n";
                 $mysqli->close();
    }
    
    static function elminiar_vendedor($id)
    {
        include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $mensaje = "resultados:";
        
        $sql = "DELETE FROM vendedor WHERE cedula =$id";
         mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
         mysqli_close($mysqli);
         header('Location:../general/vendedorG.php');
    }
    
    static function editarVendedor($id ,$nombres,$apellidos,$fecha_nacimiento)
    {
        include '../conexi.php';
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        
      if( $id!=NULL || $nombres!=NULL || $apellidos!=NULL || $fecha_nacimiento!=NULL )
      {
        $sql = "UPDATE vendedor SET nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento' WhERE cedula =$id";  
        mysqli_query($mysqli, $sql) or die(mysqli_errno($mysqli));
        mysqli_close($mysqli);
        header('Location:../general/vendedorG.php');
      }
       else
        {
            echo "Los campos deben estar completamente llenos";
        }
    }
    
    public function opcion_vendedores_sucursal($sucursal)
    {
       
        $mysql = new conexion(); 
        $mysqli=$mysql->conctar();
        $consulta= "select * from vendedor where vendedor.sucursal_idsucursal =$sucursal";
        $result   = $mysqli->query($consulta);
        echo "<select name=txt_cedVend > \n";
           while ($campo=mysqli_fetch_object($result)) 
                {
             echo "<option value=$campo->cedula > $campo->nombres </option>";
                }
                 echo "</select> \n";
                 $mysqli->close();
    }
    
    
}
