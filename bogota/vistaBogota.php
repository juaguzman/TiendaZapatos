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
        <?php include ("../bogota/headerB.php"); ?>
        
        <div>
            
             <div id="menu">
            <nav>
                <ul>
                    <li ><a href="../index.php"><img src="../img/casa.png" width="25" height="25"></a></li>
                    <li> <a href="vistaBogota.php">Zapatos</a></li>
                    <li> <a href="vendedorB.php">Vendedor</a></li>
                    <li> <a href="ventasB.php">Venta</a></li>
                    <li> <a href="venderBogota.php">Vender</a></li>  
                </ul>

            </nav>
        </div> 
        
        
            <div id="content" class="center_content">
                <div class="datagrid">
          <?php include '../conex.php';
            include '../modelo/zapatos.php';
            Zapatos::lista_zapatos_sucursal(3)?>
                    </div>
                <br>
                <br>
                 <div id="acciones">
                     <a href="../bogota/agregarZapB.php">Agregar zapatos</a>
                </div>
        </div>
        
       
            </div>
    </body>
</html>

