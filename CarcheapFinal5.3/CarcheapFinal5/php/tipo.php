<?php
class tipo{
    private $id_tipo;
    private $nombre_tipo;
    public function inicializar ($id_tipo, $nombre_tipo){
        $this->id_tipo= $id_tipo;
        $this->nombre_tipo= $nombre_tipo;
        
      }
    

    public function conectarBD(){
        $conectar=mysqli_connect("localhost", "root", "", "carcheap") or die ("No se realizó con éxito la conexión".
        mysqli_error($this->conectarBD()));
        return $conectar;
    }

    public function ingresarTipo(){
        mysqli_query($this->conectarBD(),"INSERT INTO tipo(id_tipo,nombre_tipo) values ('$this->id_tipo', '$this->nombre_tipo')") 
        or die( "Problemas en el insert".mysqli_error($this->conectarBD()));
        echo "<section class='formf-register'>
        <h4>Tipo de vehiculo agregado</h4>";
         echo "</section>";
      }

      public function borrarTipo($id_tipo){
        $registro=mysqli_query($this->conectarBD(),"SELECT * FROM tipo WHERE id_tipo=$id_tipo")or die (mysqli_error($this->conectarBD()));
    
        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar tipo de auto</h4><br>";
            echo "ID:".$reg[0]."<br>";
            echo "Tipo de auto:".$reg[1]."<br>";
          
            
            
            mysqli_query($this->conectarBD(), "DELETE FROM tipo WHERE id_tipo = $id_tipo") or die (mysqli_error($this->conectarBD()));

            echo "Tipo de vehiculo eliminado";
            echo "</section>";
            }
            else{
             echo "<section class='formf-register'>
             <h4>No existe vehiculo con ese ID</h4>";
              echo "</section>";
            }
            
            }
            public function consultarTipo($id_tipo){
          
                $registro=mysqli_query($this->conectarBD(),"SELECT id_tipo,nombre_tipo from tipo where id_tipo='$id_tipo'")or die (mysqli_error($this->conectarBD()));
                if ($reg=mysqli_fetch_array($registro)){

                    echo "<section class='formf-register'>
                    <h4>Consulta</h4><br>";
                    echo "ID:".$reg['id_tipo']."<br>";
                    echo "Tipo de auto:".$reg['nombre_tipo']."<br>";
                    echo "</section>";

                        
                    }else {
                        echo "<section class='formf-register'>
                        <h4>No existe vehiculo con ese ID</h4>";
                         echo "</section>";
                       }
              }

              public function modificarTipo($id_tipo){
                $validar = mysqli_query($this->conectarBD(), "SELECT * FROM tipo where id_tipo='$id_tipo'") or 
                die("Problemas con el buscar".mysqli_error($this->conectarBD()));
        
            if($reg = mysqli_fetch_array($validar)){
                
                echo "<section class='formf-register'>
                        <h4>Modificar</h4>";
                echo "<form action = '../php/ControlTipo.php' method = 'post'>
                        ID:
                        <input type = 'number' class='controlf'name = 'id_tipo' value = ".$reg['id_tipo']." readonly><br>
                        Tipo de vehiculo:
                        <input type = 'text' class='controlf'name = 'nombre_tipo' value = ".$reg['nombre_tipo']."><br>";
      
                echo "</select><br>
                       <input type = 'hidden' name = 'opcion' value = '5' >
                       <input type = 'submit' class='botonf' id='botonf'  value ='Modificar'>
                       </form>";
                       echo "</section>";
                    }else{
                        echo "<section class='formf-register'>
                        <h4>El ID no existe</h4>";
                        echo "</section>";
                    }
            }
      
            public function modificarTipo2($id_tipo, $nombreN){
                $validar = mysqli_query($this->conectarBD(), "SELECT * FROM tipo WHERE nombre_tipo = '$nombreN'") or die("ERROR en la sentencia".mysqli_error($this->conectarBD()));
                       
                if($reg = mysqli_fetch_array($validar)){
                    echo "<section class='formf-register'>
                    <h4>Ya existe el nombre</h4>";
                    echo "</section>";
                        }else{
                          $registro = mysqli_query($this->conectarBD(), "UPDATE tipo set nombre_tipo = '$nombreN'
                          where id_tipo=$id_tipo")
                           or die("Error en la sentencia".mysqli_error($this->conectarBD()));
                           echo "<section class='formf-register'>
                           <h4>El tipo de vehiculo ha sido modificado</h4>";
                           echo "</section>";
                        }
          }
    

    public function tablaTipo(){
        $regtipo=mysqli_query($this->conectarBD(), "SELECT * FROM tipo") or die ("No se realizó con éxito el estado".
        mysqli_error($this->conectarBD()));
        echo"<br><br>";
        echo "<table class='table1'><thead><tr><th>ID</th>
        <th>Tipo de vehiculo</th></thead>";
        echo "<tbody>";
        while($tipo=mysqli_fetch_array($regtipo)){
            echo "<tr><td>".$tipo[0]."</td><td>".$tipo[1]."";
            

        }
      
        echo"</tbody>";
        echo "</table>";
    }
    public function cerrarConexion(){
        mysqli_close($this->conectarBD());
    }
}


?>