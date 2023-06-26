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

<body class="fondoV">
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
                <li><a href="../html/Mantener_cliente.html">Cliente</a></li> 
                <li><a href="Mantener_producto.php">Vehiculos</a></li>
                <li><a href="Mantener_categoria.html">Categoria</a></li>
                <li class="cerrarSesion"><a href="../index.html">Cerrar sesion</a></li>                                 
             </ul>                                  
        </div>   
        </nav> 
            <!---Formulario para crear cuenta--->
            <main>
                <div>
                    <section class="form-registerP">
                        <h4>Agregar Producto</h4><br>
                        <?php
                        include "Vehiculo.php";
                        $ve = new Vehiculo();
                        $ve -> conectarBD();

                        $imagen = $_FILES['imagen']['tmp_name'];
                        $imgContent = addslashes(file_get_contents($imagen));

                        $ve -> inicializar($imgContent, $_REQUEST['placa_vehiculo'], $_REQUEST['precio_vehiculo'], $_REQUEST['motor_vehiculo'], 
                        $_REQUEST['kilometraje'], $_REQUEST['id_tipo'], $_REQUEST['año'], $_REQUEST['serie'], $_REQUEST['id_marca'], $_REQUEST['id_submarca'] );
                        
                        $ve -> insert();
                        $ve -> cerrarBD();
                        ?>
                    </section> 
                    </form>
                </div>
            </main>
            <br><br>
            <br><br>
            <div class="recuperar">
            <footer id="contacto">
                <div class="contenedor footer-content">
                <div class="contact-us">
                <h2 class="brand">Contacto </h2>
                <p>Número telefónico: 5517009776/ 5519696282 </p>
                <p>Dirección: Av.   Ejido   Colectivo,   Orfebres,   56353 Nezahualcóyotl, Méx.</p>
                <small>&copy; Derechos Reservados 2023 Damaris Moctezuma </small>     
                </div>
            
                <div class="social-media">
                <a href="https://www.facebook.com/profile.php?id=100089353427427&mibextid=ZbWKwL" class="social-media-icon">
                <i class='bx bxl-facebook'></i></a>
                <a href="https://twitter.com/Carcheap1?t=9j6VuqGw5dPBdiTh4Q-pRg&s=09" class="social-media-icon">
                <i class='bx bxl-twitter'></i></a>
                <a href="https://instagram.com/carcheap_?igshid=ZDdkNTZiNTM="  class="social-media-icon">
                <i class='bx bxl-instagram' ></i> </a>
                </div>
                </div>
                <div class="line"></div>
            </footer>
            
            <script src="../js/menu.js"></script>
            <script src="../js/lightbox.js"></script>
        </div>
    </body>
</html>
    