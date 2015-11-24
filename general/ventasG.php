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
        <?php include ("../general/headerG.php"); ?>
        
        <div>
            
             <div id="menu">
            <nav>
                <ul>
                    <li ><a href="index.php"><img src="../img/casa.png" width="25" height="25"></a></li>
                    <li> <a href="vista_zapatosGN.php">Zapatos</a></li>
                    <li> <a href="vendedorG.php">Vendendor</a></li>
                    <li> <a href="ventasG.php">Venta</a></li>                    
                </ul>

            </nav>
        </div> 
        
        
            <div id="content" class="center_content">
                <div class="tabla">
          <?php include '../conex.php';
            include '../modelo/vendedor.php';
            Vendedor::lista_vendedores()?>
                    </div>
        </div>
        </div>
    </body>
</html>
