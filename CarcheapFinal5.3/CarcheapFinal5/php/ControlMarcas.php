
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
                <img src="../img/logo.png" alt="" class="logo">
                </nav>
            </header>

      <!---Barra de nav-->
    
      <nav id="menuprincipal">     
        <div> 
            <ul id="listamenu">       
                <li><a href="#">Inicio</a></li>       
                <li><a href="../html/Mantener_cliente.html">Cliente</a></li> 
                <li><a href="../html/Mantener_producto.html">Productos</a></li>
                <li><a href="../html/marcas.html">Marcas</a></li>
                <li><a href="../html/submarcas.html">Submarcas</a></li>
                <li><a href="../html/tipo.html">Tipos</a></li>
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
                    <li><a href="../html/submarcas.html">Submarcas</a></li>
                    <a href="../index.html">Cerrar sesión</a> 
                </nav>
            </head>


            <!---MARCA--->
        <main>
        
            <h1 class="titulotipo"><b>MARCAS</b></h1>
        </main>
        <br><br>

            <!---CARRUSEL-->
                <div id="slider">
                    <input type="radio" name="slider" id="slide1" checked>
                    <input type="radio" name="slider" id="slide2">
                    <input type="radio" name="slider" id="slide3">
                    <input type="radio" name="slider" id="slide4">
                    <div id="slides">
                       <div id="overflow">
                          <div class="inner">
                             <div class="slide slide_1">
                                <div class="slide-content">
                                    <img src="../img/pexels-mike-b-7290405.jpg" alt="">
                                </div>
                             </div>
                             <div class="slide slide_2">
                                <div class="slide-content">
                                    <img src="../img/pexels-jay-johnson-6501202.jpg" alt="">
                                </div>
                             </div>
                             <div class="slide slide_3">
                                <div class="slide-content">
                                    <img src="../img/pexels-mike-b-1009871.jpg" alt="">
                                </div>
                             </div>
                             <div class="slide slide_4">
                                <div class="slide-content">
                                    <img src="../img/pexels-ahmad-ramadan-131811.jpg" alt="">
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div id="controls">
                       <label for="slide1"></label>
                       <label for="slide2"></label>
                       <label for="slide3"></label>
                       <label for="slide4"></label>
                    </div>
                    <div id="bullets">
                       <label for="slide1"></label>
                       <label for="slide2"></label>
                       <label for="slide3"></label>
                       <label for="slide4"></label>
                    </div>
                 </div>

                   <!---TABLA--->
        <main>
            
            <?php
            include("../php/marcas.php");
            $marcas = new marca();

            if(isset($_REQUEST['opcion'])) {
                $opcion = $_REQUEST['opcion'];
        
                switch($opcion) {
                    case 1:
                        if(isset($_REQUEST['id_marca'], $_REQUEST['nombre_marca'])) {
                            $marcas->inicializar($_REQUEST['id_marca'],$_REQUEST['nombre_marca']);
                            $marcas->ingresarMarca();
                        } else {
                            echo "Falta información para ingresar el tipo";
                        }
                        break;
        
                    case 2:
                        if(isset($_REQUEST['id_marca'])) {
                            $marcas->borrarMarca($_REQUEST['id_marca']);
                        } else {
                            echo "Falta información para borrar el tipo";
                        }
                        break;
        
                    case 3:
                        if(isset($_REQUEST['id_marca'])) {
                            $marcas->consultarMarca($_REQUEST['id_marca']);
                        } else {
                            echo "Falta información para consultar la marca";
                        }
                        break;
        
                    case 4:
                        if(isset($_REQUEST['id_marca'])) {
                            $marcas->modificarMarca($_REQUEST['id_marca']);
                        } else {
                            echo "Falta información para modificar la marca";
                        }
                        break;
        
                    case 5:
                       $marcas->modificarMarca2($_REQUEST['id_marca'],$_REQUEST['nombre_marca']);
                        break;
        
                    case 6:
                      $marcas->listarmarca(); 
                        break;
        
                    default:
                        echo "Opción inválida";
                        break;
                }
            } else {
                echo "Falta información de la opción a ejecutar";
            }
        
            $marcas->cerrarConexion();
            ?>
            </div>
        </main>
        <br><br><br><br>
   
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
    <script src="../js/menu.js"></script>
    <script src="../js/lightbox.js"></script>
</body>
</html>












