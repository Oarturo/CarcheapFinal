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
            <li><a href="../html/Index_admin.html">Inicio</a></li>       
                <li><a href="../html/usuario.html">Cliente</a></li> 
                <li><a href="../html/compra.html">Compra</a></li> 
                <li><a href="../html/venta.html">Venta</a></li> 
                <li><a href="Mantener_producto.php">Vehiculos</a></li>
                <li><a href="../html/marcas.html">Marcas</a></li>
                <li><a href="../html/submarcas.html">Submarcas</a></li>
                <li><a href="../html/tipo.html">Tipos de auto</a></li>
                <li class="cerrarSesion"><a href="../index.html">Cerrar sesion</a></li>                                
             </ul>                                  
        </div>   
        </nav> 
            <!---Formulario para crear cuenta--->
            <main>
                <div>
                    <section class="form-registerP">
                        <h4>Agregar Producto</h4><br>
                        <div id="columna1">
                            <br>
                            <br>

                          
                            <form action="../php/Ctr_vehiculo.php" method="post" enctype="multipart/form-data">
                            Imagen
                            <br>
                            <input  type="file" name="imagen" placeholder="imagen"  required><br><br>
                            Marca
                            <select name="id_marca" id="">
                                <?php
                                    include "Vehiculo.php";
                                    $ve = new Vehiculo();
                                    $ve -> llenarListaMarca(); 
                                ?>
                            </select>

                            Submarca
                            <select name="id_submarca" id="">
                                <?php
                                    
                                    $ve -> llenarListaSubMarca();
                                    
                                ?>
                            </select>
                            <br><br>
                            Placa
                            <input class="controlsP" type="text" name="placa_vehiculo" placeholder="Placa"  required>
                            Precio
                            <input class="controlsP" type="number" name="precio_vehiculo" placeholder="Precio" required>
                            Motor
                            <input class="controlsP" type="text" name="motor_vehiculo" placeholder="Precio" required>
                        </div>
                        
                        <div id="columna2">
                            <br>
                            <br>
                            Kilometraje
                            <input class="controlsP" type="number" name="kilometraje" placeholder="Kilometraje" required>
                            Categoria
                            <select name="id_tipo" id="">
                                <?php
                                    
                                    $ve -> llenarListaCategoria();
                                    $ve -> cerrarBD(); 
                                ?>
                            </select>
                            Año
                            <input class="controlsP" type="number" name="año" placeholder="año" required>
                            Serie
                            <input class="controlsP" type="number" name="serie" placeholder="Serie" required>
                               
                            <input class="botonsP" id="boton" type="submit" value="Registrar">
                       </div>

                            </form>
                                             </section> 
                   
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
    