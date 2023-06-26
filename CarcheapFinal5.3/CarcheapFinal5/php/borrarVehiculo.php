<?php
    include "Vehiculo.php";
    $ve = new Vehiculo();
    $ve -> borrarVehiculo($_GET["id"]);
    header('Location: Mantener_producto.php');
?>