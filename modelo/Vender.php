<?php
        include '../conexi.php';
        $id=$_GET['id'];
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $consulta= "SELECT * FROM zapatos where idzapatos = $id";
        $result=$mysqli->query($consulta);
        $campo=mysqli_fetch_object($result)
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/css.css">
        <link type="text/css" rel="stylesheet" href="../css/cssGen.css">
        <title></title>
    </head>
    <body>
        <?php include ("../header.php"); ?>

        <div>
            
             <div id="menu">
            <nav>
                <ul>
                    <li ><a href="../index.php"><img src="../img/casa.png" width="25" height="25"></a></li>
                    <li> <a href="vistaCali.php">Zapatos</a></li>
                    <li> <a href="vendedorCali.php">Vendendor</a></li>
                    <li> <a href="ventasC.php">Venta</a></li>                    
                </ul>

            </nav>
        </div> 
        
        
            <div id="content" class="center_content">
                <div class="datagrid">
                    <form action="../modelo/procesar_venta.php" method="post">
                    <table>
                        <thead><tr><td colspan="4"><h2>Formato de Facturacion</h2></td><td>Fecha:</td> <td><input type="text" name="txt_fecha" value="<?php echo date("Y-m-d");?>" readonly=""></td></tr>
                            <tr><td colspan="2">Cliente:</td><td><input type="text" name="txt_cliente" required=""/></td> <td colspan="2">Cedula:</td><td><input type="number" name="txt_cedCli" required=""/></td></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Id Producto</td><td>Marca</td><td>modelo</td><td>Valor Unidad</td><td>Cantidad Disponible</td><td>Cantidad</td>
                            </tr>
                            <tr>
                                <td><?php echo $campo->idzapatos?></td><td><?php echo $campo->marca?></td><td><?php echo $campo->modelo?></td><td><?php echo $campo->valor?><td><?php echo $campo->cantidad?></td><td><input type="number" name="txt_cant" required=""/> </td>
                                 <input type="hidden" value="<?php echo $campo->valor?>" name="valorUni" >
                                 <input type="hidden" value="<?php echo $campo->idzapatos?>" name="txt_id">
                                 <input type="hidden" value="<?php echo $campo->cantidad?>" name="cantDisp">
                            </tr>
                        </tbody>
                        <br/>
                        <br/>
                        <br/>
                        <tfoot >
                            
                            <tr><td></td><td></td><td></td><td></td><td>  Vendedor:</td> <td><?php include './vendedor.php'; Vendedor::opcion_vendedores_sucursal(2) ?>  </td></tr>
                        </tfoot>
                       
                    </table>
                        
                       
                        
                        
                        <input type="submit" value="Vender" class="boton"/>
                        <input type="hidden" value="Vender" name="req_venta" >
                        
                        </form>
                </div>
        </div>
        
       
            </div>
    </body>
</html>

