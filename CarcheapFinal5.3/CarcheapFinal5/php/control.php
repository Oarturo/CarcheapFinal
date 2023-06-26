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
                <li><a href="../html/usuario.html">Usuarios</a></li>
                <li><a href="../html/venta.html">Ventas</a></li> 
                <li><a href="../html/compra.html">Productos</a></li>
                <li class="cerrarSesion"><a href="../index.html">Cerrar sesion</a></li>                                 
             </ul>                                  
        </div>   
        </nav> 
        <main>
            <!---Formulario para crear cuenta--->
            <main>
                <div>
                    <form action="usuario.php">
                    <section class="form-registerC">
                        <h4>Agregar Cliente</h4>
                        <div id="columna3">
                            <?php

                            include 'usuario.php';
                                $usu = new Usuario();
                                switch ($_REQUEST['opcion']){
                                    case 1:
                                        $usu -> inicializar( $_REQUEST['nombreU'], $_REQUEST['apellidoP'], $_REQUEST['apellidoM'], $_REQUEST['codigogenero'], $_REQUEST['correo'], $_REQUEST['clave'], $_REQUEST['tel'], $_REQUEST['dir']);
                                        $usu -> insertar();
                                        break;
                                    case 4:
                                        $usu ->eliminar($_REQUEST['id']);
                                        break;
                                    case 5:
                                        $usu ->consultar($_REQUEST['correo']);
                                        break;
                                    case 6:
                                        $usu ->tabla();
                                        break;
                                }
                                $usu ->cerrarbd();                          
                            ?>
                       </div>
                    </section> 
                </form>
                </div>
            </main>
            <br><br>
            <br><br>
            <div class="recuperar">
           
            
            <script src="../js/menu.js"></script>
            <script src="../js/lightbox.js"></script>
        </div>

            </body>
            </html>