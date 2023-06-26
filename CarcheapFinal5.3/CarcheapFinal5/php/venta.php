<?php

class Venta{

    private $id_vehiculo;
    private $id_usuario;

    public function inicializar($id_vehiculo, $id_usuario){

        $this ->id_vehiculo = $id_vehiculo;
        $this ->id_usuario = $id_usuario;
    }
    public function conectarBD(){

        $conectar=mysqli_connect("localhost", "root", "", "carcheap") or die ("Problemas con la conexion a la base de datos".mysqli_error($this->conectarBD()));
        return $conectar;
    }
    public function insertar(){
        
        mysqli_query($this->conectarBD(),"INSERT INTO venta (id_vehiculo, id_usuario) values ('".$this->id_vehiculo."', '".$this->id_usuario."')") 
        or die( "Problemas en el insert".mysqli_error($this->conectarBD()));
        echo "<section class='formf-register'>
        <h4>Venta Ingresada</h4>";
         echo "</section>";

        
         
    }
    public function modificar($id_vehiculo){
        $validar=mysqli_query($this->conectarBD(), "SELECT * FROM venta WHERE id_vehiculo = $id_vehiculo") or die ("Problemas con la conexion".mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($validar)){

            echo "<section class='formf-register'>
                <h4>Modificar</h4>";
            
            echo " <form action='controlVent.php' method='post'>

                ID vehiculo:
                <input type='number' class='controlf' name='id_vehiculo' value=".$reg[0]." readonly><br>

                ID usuario:
                <input type='number' class='controlf' name='id_usuario' value=".$reg[1].">";

                echo "
                <input type = 'hidden' name = 'opcion' value = '3' >
                <input type = 'submit' class='botonf' id='botonf' value ='Modificar'>
                </form>";
           
        }
    }
    public function modificar2($id_vehiculo, $id_vehiculoN, $id_usuarioN){

        
        $validar=mysqli_query($this->conectarBD(), "SELECT * FROM venta WHERE id_vehiculo=$id_vehiculo") or die ("Error en la sentencia".mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($validar)){

            echo "La venta ya existe";
        }else{
            $reg=mysqli_query($this->conectarBD(), "UPDATE venta SET id_vehiculo='$id_vehiculo', id_vehiculo='$id_vehiculoN' id_usuario='$id_usuarioN'") or die ("Error en la sentencia".mysqli_error($this->conectarBD()));

            echo "Se ha modificado correctamente";
        }
    }
    public function eliminar($id_vehiculo){
        $registro=mysqli_query($this->conectarBD(), "SELECT id_vehiculo, id_usuario  FROM venta where id_vehiculo=$id_vehiculo") or die (mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar usuario</h4><br>";
            echo "id vehiculo:".$reg['id_vehiculo']."<br>";
            echo " id usuario:".$reg['id_usuario']."<br>";
            mysqli_query($this->conectarBD(), "DELETE FROM venta WHERE id_vehiculo=$id_vehiculo") or die ("Error en el delete".mysqli_error($this->conectarBD()));
            echo "Venta eliminado";
            
        }else {
            echo"No existe usuario con dicho codigo";
        }
    }
    public function consultar($id_vehiculo){
        $consultar=mysqli_query($this->conectarBD(), "SELECT * FROM venta WHERE id_vehiculo='$id_vehiculo'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));

        if ($consul=mysqli_fetch_array($consultar)){
            echo"<b>El usuario</b><br><br>";
                    echo"<b>Id vehiculo: ".$consul['id_vehiculo']."</b><br>";  
                    echo"<b>id_usuario : ".$consul['id_usuario']."</b><br>";
        }else{
            echo "No existe el venta con dicho id";
        }
    }
    public function tabla(){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM venta") or die ("Fallo en la conexion".mysqli_error($this->conectarBD()));
        echo "<br><br>";
        echo "<table class='table1'><thead>
        <th>ID vehiculo</th><th> ID usuario</th>";
        echo "<tbody>";
        while($reg=mysqli_fetch_array($registro)){
            echo "<tr><td>".$reg[0]."</td><td>".$reg[1]."";
        }

    }
    public function cerrarbd(){
        mysqli_close($this ->conectarBD());
    }

}

?>