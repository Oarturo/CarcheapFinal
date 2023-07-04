<?php

session_start();

if (isset($_POST['correo']) && isset($_POST['clave'])) {
    $db = new mysqli('localhost', 'root', '', 'carcheap');

    $stmt = $db->prepare('SELECT nombreU, adm FROM usuarios WHERE correo = ? AND clave = ?');
    $stmt->bind_param('ss', $_POST['correo'], $_POST['clave']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['correo'] = $_POST['correo'];
        $_SESSION['nombreU'] = $row['nombreU'];
        if ($row['adm']) {
            header('Location: ../html/Index_admin.php');
        } else {
            header('Location: ../html/Index_cliente.php');
        }
        exit;
    } else {
        // El correo electrónico o la contraseña son incorrectos
        // Manejar este caso como desees
    }
}
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/car.jpg">
    <title>CARCHEAP</title>
</head>

<body>
        <!--Titulo Cabecera-->
        <section class="inicio" id="inicio">
            <header id="cabeceralogo">     
                <div>       
                <h1>CARCHEAP</h1>  
                <h2>Conduce tus propios sueños</h2> ';
                echo'
                </div>   
                <nav>
                <div class="Logo">
                <img src="../img/logo.png" alt="" class="logo">
                </nav>
            </header>

      <!---Barra de nav-->
    
      <nav id="menuprincipal">
        <div>
            <ul id="listamenu">
                <li><a href="#">Inicio</a></li>
                <li><a href="usuario.html">Cliente</a></li>
                <li><a href="compra.html">Compra</a></li>
                <li><a href="venta.html">Venta</a></li>
                <li><a href="../php/Mantener_producto.php">Vehiculos</a></li>
                <li><a href="marcas.html">Marcas</a></li>
                <li><a href="submarcas.html">Submarcas</a></li>
                <li><a href="../html/tipo.html">Tipos de auto</a></li>
                <li class="cerrarSesion"><a href="../index.html">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>

            <!---Menu HAMBURGUESA-->
            <head class="objetivo-head" id="inicio">
                <img src="../img/bx-menu-alt-right.svg" alt="" class="photo">
                <nav class="menu-navegacion">
                    <a href="#">Inicio</a>
                    <a href="../html/Mantener_cliente.html">Cliente</a>
                    <a href="../html/Mantener_producto.html">Productos</a>
                    <a href="../html/marcas.html">Marcas</a>
                    <a href="../html/tipo.html">Tipos de auto</a></li>
                    <li><a href="../html/submarcas.html">Submarcas</a></li>
                    <a href="../index.html">Cerrar sesión</a>
                </nav>
            </head>
    
    

            <!---BANNER--->
            <section class="bienvenidos" id="bienvenidos"></section>
            <div class="header">';
            if (isset($_SESSION['nombreU'])): ?>
                <p class="titulo">Bienvenido, <?= htmlspecialchars($_SESSION['nombreU']) ?>!</p>
            <?php endif; 
            echo'
                
                
            </div>

    <br>
    <br>
    <br>
    <br>
          <!---SERVICIOS--->
            <section class="servicios" id="servicios">
                <div class="contenedor-servicio"> 
                <img src="../img/Config.webp" alt="" class="img-galeria">
                <div class="checklist-servicio">
                <h2 class="subtitulos">Opciones</h2>
                <div class="service">
                <h3 class="n-service">
                <p>1- En este apartado podras hacer diferentes funciones como administrador tales como agregar, eliminar o modificar un producto.</p>
                <p>2- De igual manera podras modificar otros aspectos asi como los registros que tenemos de nuestros clientes.</p>
                </div>
                </section>

                <div class="box3">
                </div>
                   
          
        <!--footer-->

        <footer id="contacto">
            <div class="contenedor footer-content">
                <div class="contact-us">
                    <h2 class="brand">Contacto </h2>
                    <p>Número telefónico: 5517009776/ 5519696282 </p>
                    <p>Dirección: Av.   Ejido   Colectivo,   Orfebres,   56353 Nezahualcóyotl, Méx.</p>
                    <small>&copy; Derechos Reservados 2023 CarCheap</small>
    
                </div>
                <div class="social-media">
                    <a href="https://www.facebook.com/profile.php?id=100089353427427&mibextid=ZbWKwL" class="social-media-icon">
                        <i class="bx bxl-facebook"></i>
                    </a>
                    <a href="https://twitter.com/Carcheap1?t=9j6VuqGw5dPBdiTh4Q-pRg&s=09" class="social-media-icon">
                        <i class="bx bxl-twitter"></i>
                    </a>
                    <a href="https://instagram.com/carcheap_?igshid=ZDdkNTZiNTM="  class="social-media-icon">
                       <i class="bx bxl-instagram" ></i>
                    </a>
                </div>
                <div class="line"></div>
        </footer>        
        <script src="../js/menu.js"></script>
        <script src="../js/lightbox.js"></script>
</body>
</html>';
?>