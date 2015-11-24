<?php
include './zapatos.php';
switch ($_REQUEST['req_zap'])
{
    case 'Enviar':
        $marca = $_POST['txt_marca'];
        $modelo = $_POST['txt_modelo'];
        $cantidad = $_POST['txt_cant'];
        $valo = $_POST['txt_valor'];
        $sucursal_idsucursal = $_POST['txt_idsucu'];
        
        $mensaje= Zapatos::insertarZapatos($marca, $modelo, $cantidad, $valo, $sucursal_idsucursal);
        
        break;
}

