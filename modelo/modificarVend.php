<?php
        include '../conexi.php';
        $id=$_GET['id'];
        $mysql = new conexion();
        $mysqli=$mysql->conctar();
        $consulta= "SELECT * FROM vendedor where cedula = $id";
        $result=$mysqli->query($consulta);
        $campo=mysqli_fetch_object($result)
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/css.css">
        <link type="text/css" rel="stylesheet" href="../css/cssGen.css">
        <title></title>
    </head>
    <body>
        <?php include ("../pasto/headerP.php"); ?>
        
        <div>
            
             <div id="menu">
            <nav>
                <ul>
                    <li ><a href="index.php"><img src="../img/casa.png" width="25" height="25"></a></li>
                    <li> <a href="vistaPasto.php">Zapatos</a></li>
                    <li> <a href="vendedorP.php">Vendendor</a></li>
                    <li> <a href="ventasP.php">Venta</a></li>                    
                </ul>

            </nav>
        </div> 
        
        
            <div id="content" class="center_content">
                <div class="datagrid">
                    <form action="../modelo/procesar_vendedor.php" method="post">
            <table border="1">
                <thead>
                    <tr align ="center">
                        <th colspan="2">Modificar Vendedor</th> <!-- titulos de el formulario -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cedula:</td>
                        <td><input type="number" name="txt_id" value="<?php echo $campo->cedula ;?>" readonly="" required=""/></td>
                    </tr>
                    <tr>
                        <!--,,-->
                        <td>Nombres:</td>
                        <td><input type="text" name="txt_nombre" value="<?php echo $campo->nombres ;?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td><input type="text" name="txt_apellido" value="<?php echo $campo->apellidos ;?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Fecha nacimiento:</td>
                        <td><input type="text" name="txt_fecha" value="<?php echo $campo->fecha_nacimiento ;?>" required=""/></td>
                    </tr>
                    
                </tbody>
            </table>
                    
            <table>
                <tr>
                    <td>
            <input type="submit" value="Modificar" class="boton"/>
            <input type="hidden" value="Modificar" name="req_vende" >
            </td>
            </tr>
            </table>

          </form>
                    </div>
        </div>
        
       
            </div>
    </body>
</html>

