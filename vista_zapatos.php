<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/css.css">
        <title></title>
    </head>
     <?php include './header.php'; ?>
    <body>
        <div id="section">
            <br> <!-- espacio -->
            <br>
            <?php include './conex.php';
            include './zapatos.php';
            Zapatos::lista_zapatos()?>
        </div>
    </body>
</html>
