<?php

class Compra{

    private $id_compra;
    private $id_vehiculo;
    private $id_usuario;

    public function inicializar($id_compra, $id_vehiculo, $id_usuario){

        $this ->id_compra = $id_compra;
        $this ->id_vehiculo = $id_vehiculo;
        $this ->id_usuario = $id_usuario;
    }
    public function conectarBD(){

        $conectar=mysqli_connect("localhost", "root", "", "carcheap") or die ("Problemas con la conexion a la base de datos".mysqli_error($this->conectarBD()));
        return $conectar;
    }
    public function insertar(){
        
        mysqli_query($this->conectarBD(),"INSERT INTO compra (id_compra, id_vehiculo, id_usuario) values ('".$this->id_compra."','".$this->id_vehiculo."', '".$this->id_usuario."')") 
        or die( "Problemas en el insert".mysqli_error($this->conectarBD()));
        echo "<section class='formf-register'>
        <h4>Compra Ingresada</h4>";
         echo "</section>";
        
         
    }
    public function modificar($id_compra){
        $validar=mysqli_query($this->conectarBD(), "SELECT * FROM venta WHERE id_vehiculo = $id_compra") or die ("Problemas con la conexion".mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($validar)){

            echo "<section class='formf-register'>
                <h4>Modificar</h4>";
            
            echo " <form action='controlVent.php' method='post'>

                ID Compra:
                <input type='number' class='controlf' name='id_vehiculo' value=".$reg[0]."><br>

                ID Vehiculo:
                <input type='number' class='controlf' name='id_vehiculo' value=".$reg[1]."><br>

                ID Usuario:
                <input type='number' class='controlf' name='id_usuario' value=".$reg[2].">";

                echo "
                <input type = 'hidden' name = 'opcion' value = '3' >
                <input type = 'submit' class='botonf' id='botonf' value ='Modificar'>
                </form>";
           
        }
    }
    public function modificar2($id_compra, $id_vehiculoN, $id_usuarioN){

        
        $validar=mysqli_query($this->conectarBD(), "SELECT * FROM venta WHERE id_vehiculo=$id_compra") or die ("Error en la sentencia".mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($validar)){

            echo "La venta ya existe";
        }else{
            $reg=mysqli_query($this->conectarBD(), "UPDATE venta SET id_vehiculo='$id_compra', id_vehiculo='$id_vehiculoN' id_usuario='$id_usuarioN'") or die ("Error en la sentencia".mysqli_error($this->conectarBD()));

            echo "Se ha modificado correctamente";
        }
    }
    public function eliminar($id_compra){
        $registro=mysqli_query($this->conectarBD(), "SELECT id_compra, id_vehiculo, id_usuario  FROM compra where id_compra=$id_compra") or die (mysqli_error($this->conectarBD()));
        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar compra </h4><br>";
            echo "id compra:".$reg['id_compra']."<br>";
            echo "id vehiculo:".$reg['id_vehiculo']."<br>";
            echo " id usuario:".$reg['id_usuario']."<br>";
            mysqli_query($this->conectarBD(), "DELETE FROM compra WHERE id_compra=$id_compra") or die ("Error en el delete".mysqli_error($this->conectarBD()));
            echo "compra eliminada";
            
        }else {
            echo"No existe usuario con dicho codigo";
        }
    }
    public function consultar($id_compra){
        $consultar=mysqli_query($this->conectarBD(), "SELECT * FROM compra WHERE id_compra='$id_compra'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));

        if ($consul=mysqli_fetch_array($consultar)){
            echo"<b>Información</b><br><br>";
                    echo"<b>Id compra: ".$consul['id_compra']."</b><br>";  
                    echo"<b>Id vehiculo: ".$consul['id_vehiculo']."</b><br>";  
                    echo"<b>id_usuario : ".$consul['id_usuario']."</b><br>";
        }else{
            echo "No existe el venta con dicho id";
        }
    }
    public function tabla(){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM compra") or die ("Fallo en la conexion".mysqli_error($this->conectarBD()));
        echo "<br><br>";
        echo "<table class='table1'><thead><th>ID compra</th>
        <th>ID vehiculo</th><th>  ID usuario</th>";
        echo "<tbody>";
        while($reg=mysqli_fetch_array($registro)){
            echo "<tr><td>".$reg[0]."</td><td>".$reg[1]."</td><td>".$reg[2]."";
        }

    }
    public function cerrarbd(){
        mysqli_close($this ->conectarBD());
    }

}

?>