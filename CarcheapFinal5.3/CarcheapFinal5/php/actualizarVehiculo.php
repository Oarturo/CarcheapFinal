<?php

    $imagen = $_FILES['imagen']['tmp_name'];
    $imgContent = addslashes(file_get_contents($imagen));

    include "Vehiculo.php";
    $ve = new Vehiculo();
    $ve -> actualizarVehiculo($_REQUEST["id_vehiculo"], $imgContent, $_REQUEST['placa_vehiculo'], $_REQUEST['precio_vehiculo'], $_REQUEST['motor_vehiculo'], 
    $_REQUEST['kilometraje'], $_REQUEST['id_tipo'], $_REQUEST['año'], $_REQUEST['serie'], $_REQUEST['id_marca'], $_REQUEST['id_submarca'] );

    header('Location: Mantener_producto.php');
?>