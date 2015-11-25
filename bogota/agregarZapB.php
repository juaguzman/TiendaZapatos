<!DOCTYPE html>

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
                    <li ><a href="index.php"><img src="../img/casa.png" width="25" height="25"></a></li>
                    <li> <a href="vistaBogota.php">Zapatos</a></li>
                    <li> <a href="vendedorB.php">Vendendor</a></li>
                    <li> <a href="ventasB.php">Venta</a></li>                    
                </ul>

            </nav>
        </div> 
        
        
            <div id="content" class="center_content">
                <div class="datagrid">
                    <form action="../modelo/procesar_zapatos.php" method="post">
            <table border="1">
                <thead>
                    <tr align ="center">
                        <th colspan="2">Agregar Zapato</th> <!-- titulos de el formulario -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Marca:</td>
                        <td><input type="text" name="txt_marca" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Modelo:</td>
                        <td><input type="text" name="txt_modelo" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Cantidad:</td>
                        <td><input type="number" name="txt_cantidad" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Valor:</td>
                        <td><input type="number" name="txt_valor" value="" required=""/></td>
                    </tr>
                     <input hidden="" type="hidden" name="txt_idsucu" value="3" />
                    
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
            <input type="submit" value="Enviar" class="boton"/>
            <input type="hidden" value="Enviar" name="req_zap" >
            </td>
            </tr>
            </table>

          
                    </div>
        </div>
        
       
            </div>
    </body>
</html>

