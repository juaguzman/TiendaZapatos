<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/css.css">
        <link type="text/css" rel="stylesheet" href="../css/cssGen.css">
        <title></title>
    </head>
    <body>
        <?php include ("../cali/headerC.php"); ?>
        
        <div>
            
             <div id="menu">
            <nav>
                <ul>
                    <li ><a href="index.php"><img src="../img/casa.png" width="25" height="25"></a></li>
                    <li> <a href="vistaCali.php">Zapatos</a></li>
                    <li> <a href="vendedorCali.php">Vendendor</a></li>
                    <li> <a href="ventasC.php">Venta</a></li>                    
                </ul>

            </nav>
        </div> 
            <div id="content" class="center_content">
                <div class="datagrid">
                    <form action="../modelo/procesar_vendedor.php" method="post">
                        
                        <table border="1">
                <thead>
                    <tr align ="center">
                        <th colspan="2">Agregar Vendedor</th> <!-- titulos de el formulario -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cedula:</td>
                        <td><input type="number" name="txt_id" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="txt_nombre" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Apellido:</td>
                        <td><input type="text" name="txt_apellido" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Fecha:</td>
                        <td><input type="date" name="txt_fecha" value="" required=""/></td>
                    </tr>
                     <input hidden="" type="hidden" name="txt_idsucu" value="1" />
                    
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
                        <input type="submit" value="Enviar" class="boton"/>
                        <input type="hidden" value="Enviar" name="req_vende" >
                    </td>
                </tr>
            </table>

          
            </div>   
        </div>
           
        
        
            
        
       
            </div>
    </body>
</html>



