<?php
include '../modelo/zapatos.php';

switch ($_REQUEST['req_zap'])
{
    case 'Enviar':
        $marca = $_POST['txt_marca'];
        $modelo = $_POST['txt_modelo'];
        $cantidad = $_POST['txt_cantidad'];
        $valor = $_POST['txt_valor'];
        $sucursal_idsucursal = $_POST['txt_idsucu'];
        
       
        
        $mensaje= Zapatos::insertarZapatos($marca, $modelo, $cantidad, $valor, $sucursal_idsucursal);
        header('Location:../general/vista_zapatosGN.php');
        break;
    
    case 'Eliminar':
        $id = $_REQUEST['id'];
        $mensaje = Zapatos::eliminar_zapatos($id);
        header('Location:../general/vista_zapatosGN.php');
        break;
    
    case "Modificar":
if(isset($_POST['txt_id']))
{
    $id= (int)$_POST['txt_id'];
    
    if($id>0)
    {
        $id = $_POST['txt_id'];
        $marca = $_POST['txt_marca'];
        $modelo = $_POST['txt_modelo'];
        $cantidad = $_POST['txt_cantidad'];
        $valor = $_POST['txt_valor'];
        Zapatos::editarZapatos($id,$marca, $modelo, $cantidad, $valor);
       header('Location:../general/vista_zapatosGN.php');
    }
    else
        echo 'id menor a 0';
}

break;    
}

