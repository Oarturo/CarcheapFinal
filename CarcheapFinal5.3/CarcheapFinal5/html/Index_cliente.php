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
            header('Location: Index_admin.php');
        } else {
            header('Location: Index_cliente.php');
        }
        exit;
    } else {
        // El correo electrónico o la contraseña son incorrectos
        // Manejar este caso como desees
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <h2>Conduce tus propios sueños</h2>
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
                <li class="caja-2"><a href="#">Inicio</a></li>  
                <li class="caja-2"><a href="Objetivo_cliente.html">Objetivo</a></li>   
                <li class="caja-1"><a href="Quienes_cliente.html">¿Quiénes somos?</a></li>    
                <li><a href="Mision_Vision_cliente.html">Misión y visión</a></li> 
                <li><a href="Vehiculos_cliente.html">Autos</a></li>
                <li><a href="Contacto_cliente.html">Contacto</a></li>   
                <li class="caja-2"><a href="../index.html">Cerrar sesión</a></li>     
             </ul>                                  
        </div>  
        </nav> 

    
            <!---Menu HAMBURGUESA-->

            <head class="objetivo-head" id="inicio">
                <img src="../img/bx-menu-alt-right.svg" alt="" class="photo">
                <nav class="menu-navegacion">
                    <a href="#">Inicio</a>
                    <a href="objetivo.html">Objetivo</a>
                    <a href="quienes.html">¿Quiénes somos?</a>
                    <a href="Misión_Visión.html">Misión y visión</a>
                    <a href="vehiculos.html">Autos</a>
                    <a href="contacto.html">Contacto</a>
                    <a href="Iniciar_sesion.html">Iniciar sesión</a>
                </nav>
            </head>

            <!---BANNER--->
            <section class="bienvenidos" id="bienvenidos"></section>
            <div class="header">
            <?php if (isset($_SESSION['nombreU'])): ?>
                <p class="titulo">Bienvenido, <?= htmlspecialchars($_SESSION['nombreU']) ?>!</p>
            <?php endif; ?> 
            </div>

        <main>
              <!---TARJETAS-->
              <div class="box3">
                <section class="autos" id="autos"></section>
                <h1 class="tituloautos"><b>Autos</b></h1>
            </div>

            <div class="contenedor-tar">
                <div class="tarjeta-car">
                <h2 class="titulotarjeta">Oferta</h2>
                <div class="cuerpo-tar"> <img src="../img/tarketa1.jpg" alt="muestra" class="img-tarjeta"><p>Nissan</p></div>
                <div class="pie-tar"><a href="#"><a href="../Carcheap 2/html/vehiculos.html">Más información</a></div>
                </div>

                <div class="contenedor-tar">
                    <div class="tarjeta-car">
                    <h2 class="titulotarjeta">Oferta</h2>
                    <div class="cuerpo-tar"> <img src="../img/2.jpeg" alt="muestra" class="img-tarjeta"><p>Seat</p></div>
                    <div class="pie-tar"><a href="../Carcheap 2/html/vehiculos.html">Más información</a> </div>
                    </div>

                    <div class="contenedor-tar">
                        <div class="tarjeta-car">
                        <h2 class="titulotarjeta">Oferta</h2>
                        <div class="cuerpo-tar"> <img src="../img/5.jpeg" alt="muestra" class="img-tarjeta"><p>Volkswagen</p></div>
                        <div class="pie-tar"> <a href="../Carcheap 2/html/vehiculos.html">Más información</a> </div>
                        </div>      
                    </div>
                </div>
            </div>    
        </main>

    <br>
    <br>
    <br>
    <br>
          <!---SERVICIOS--->
            <section class="servicios" id="servicios">
                <div class="contenedor-servicio"> 
                <img src="../img/joey-banks-YApiWyp0lqo-unsplash.jpg" alt="" class="img-galeria">
                <div class="checklist-servicio">
                <h2 class="subtitulos">Servicios</h2>
                <div class="service">
                <h3 class="n-service">
                <p>1- Compramos tu auto de manera fácil y rápida (evaluandolo al mejor precio que puedas encontrar)</p>
                <p>2- Venta de autos seminuevos en muy buenas condiciones (contamos con un amplio catalogo de vehículos)</p>
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
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a href="https://twitter.com/Carcheap1?t=9j6VuqGw5dPBdiTh4Q-pRg&s=09" class="social-media-icon">
                        <i class='bx bxl-twitter'></i>
                    </a>
                    <a href="https://instagram.com/carcheap_?igshid=ZDdkNTZiNTM="  class="social-media-icon">
                       <i class='bx bxl-instagram' ></i>
                    </a>
                </div>
                <div class="line"></div>
        </footer>        
        <script src="js/menu.js"></script>
        <script src="js/lightbox.js"></script>
</body>
</html>