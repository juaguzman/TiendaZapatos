<?php
include './vendedor.php';
switch ($_REQUEST['req_vende'])
{
    case 'Enviar':
        $cedula =$_POST['txt_id'];
        $nombre = $_POST['txt_nombre'];
        $apellido = $_POST['txt_apellido'];
        $fecha = $_POST['txt_fecha'];
        $sucursal_idsucursal = $_POST['txt_idsucu'];
        
        $mensaje= Vendedor::insertarvendedor($cedula, $nombre, $apellido,$fecha, $sucursal_idsucursal);
        header('Location:../general/vendedorG.php');
        break;
    
    case 'Eliminar':
        $id = $_REQUEST['id'];
        $mensaje = Vendedor::elminiar_vendedor($id);
        header('Location:../general/vendedorG.php');
        break;
    
    case "Modificar":
if(isset($_POST['txt_id']))
{
    $id= (int)$_POST['txt_id'];
    
    if($id>0)
    {
        
        $cedula =$_POST['txt_id'];
        $nombre = $_POST['txt_nombre'];
        $apellido = $_POST['txt_apellido'];
        $fecha = $_POST['txt_fecha'];
        Vendedor::editarVendedor($cedula, $nombre, $apellido, $fecha);
        header('Location:../general/vendedorG.php');
    }
    else
        echo 'id menor a 0';
}
        
}

