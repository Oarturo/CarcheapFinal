<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../../img/car.jpg">
    <title>CARCHEAP</title>
</head>

<body class="formulariose">
        <!--Titulo Cabecera-->
        <section class="inicio" id="inicio">
            <header id="cabeceralogo">     
                <div>       
                <h1>CARCHEAP</h1>  
                <h2>Conduce tus propios sueños</h2> 
                </div>   
                <nav>
                <div class="Logo">
                <img src="../../img/logo.png" alt="" class="logo">
                </nav>
            </header>

      <!---Barra de nav-->
    
      <nav id="menuprincipal">     
        <div> 
            <ul id="listamenu">       
                <li><a href="#">Inicio</a></li>       
                <li><a href="../../html/Mantener_cliente.html">Cliente</a></li> 
                <li><a href="../../html/Mantener_producto.html">Productos</a></li>
                <li><a href="../../html/marcas.html">Marcas</a></li>
                <li><a href="../../html/submarcas.html">Submarcas</a></li>
                <li><a href="../../html/tipo.html">Tipos</a></li>
                <li class="cerrarSesion"><a href="../index.html">Cerrar sesión</a></li>    
             </ul>                                  
        </div>   
        </nav> 

    
            <!---Menu HAMBURGUESA-->

            <head class="objetivo-head" id="inicio">
                <img src="../../img/bx-menu-alt-right.svg" alt="" class="photo">
                <nav class="menu-navegacion">
                    <a href="#">Inicio</a>       
                    <a href="../../html/Mantener_cliente.html">Cliente</a> 
                    <a href="../../html/Mantener_producto.html">Productos</a>
                    <a href="../../html/marcas.html">Marcas</a>
                    <a href="../../html/tipo.html">Tipos</a>
                    <li><a href="../../html/submarcas.html">Submarcas</a></li>
                    <a href="../../index.html">Cerrar sesión</a> 
                </nav>
            </head>


            <!---usuarios--->
        <main>
        
            <h1 class="titulotipo"><b>Usuarios</b></h1>
        </main>
      <!---Formulario--->
            
      <main>
                <?php
             include ("../../php/compra.php");
             $tabla= new Compra();
             $tabla->tabla();
             $tabla->cerrarbd();
            ?>
</main>
<br><br>
            <br><br>

            <div class="recuperar">
                
                <script src="js/menu.js"></script>
                <script src="js/lightbox.js"></script>
            </div>
    
                </body>
                </html>