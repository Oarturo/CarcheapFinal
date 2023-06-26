<?php
class marca{
    private $id_marca;
    private $nombre_marca;  
    public function inicializar ($id_marca, $nombre_marca){
        $this->id_marca= $id_marca;
        $this->nombre_marca= $nombre_marca;
        
      }
    
    public function conectarBD(){
        $conectar=mysqli_connect("localhost", "root", "", "carcheap") or die ("No se realizó con éxito la conexión".
        mysqli_error($this->conectarBD()));
        return $conectar;
    }

    public function ingresarMarca(){
        mysqli_query($this->conectarBD(),"INSERT INTO marca(id_marca,nombre_marca) values ('$this->id_marca', '$this->nombre_marca')") 
        or die( "Problemas en el insert".mysqli_error($this->conectarBD()));
        echo "<section class='formf-register'>
        <h4>Tipo de marca agregado</h4>";
         echo "</section>";
      }

      public function borrarMarca($id_marca){
        $registro=mysqli_query($this->conectarBD(),"SELECT * FROM marca WHERE id_marca=$id_marca")or die (mysqli_error($this->conectarBD()));
    
        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar tipo de auto</h4><br>";
            echo "ID:".$reg[0]."<br>";
            echo "Nombre de marca:".$reg[1]."<br>";
          
            
            
            mysqli_query($this->conectarBD(), "DELETE FROM marca WHERE id_marca = $id_marca") or die (mysqli_error($this->conectarBD()));
            echo "Tipo de marca eliminada";
            echo "</section>";
            }
            else{
             echo "<section class='formf-register'>
             <h4>No existe marcas con ese ID</h4>";
              echo "</section>";
            }
            
            }
            public function consultarMarca($id_marca){
          
                $registro=mysqli_query($this->conectarBD(),"SELECT id_marca,nombre_marca from marca where id_marca='$id_marca'")or die (mysqli_error($this->conectarBD()));
                if ($reg=mysqli_fetch_array($registro)){

                    echo "<section class='formf-register'>
                    <h4>Consulta</h4><br>";
                    echo "ID:".$reg['id_marca']."<br>";
                    echo "Marca:".$reg['nombre_marca']."<br>";
                    echo "</section>";

                        
                    }else {
                        echo "<section class='formf-register'>
                        <h4>No existe marca con ese ID</h4>";
                         echo "</section>";
                       }
              }

              public function modificarMarca($id_marca){
                $validar = mysqli_query($this->conectarBD(), "SELECT * FROM marca where id_marca='$id_marca'") or 
                die("Problemas con el buscar".mysqli_error($this->conectarBD()));
        
            if($reg = mysqli_fetch_array($validar)){
                
                echo "<section class='formf-register'>
                        <h4>Modificar</h4>";
                echo "<form action = '../php/ControlMarcas.php' method = 'post'>
                        ID:
                        <input type = 'number' class='controlf'name = 'id_marca' value = ".$reg[0]." readonly><br>
                        Tipo de vehiculo:
                        <input type = 'text' class='controlf' name = 'nombre_marca' value = ".$reg[1]."><br>";
      
                echo "</select><br>
                       <input type = 'hidden' name = 'opcion' value = '5' >
                       <input type = 'submit' class='botonf' id='botonf' value ='Modificar'>
                       </form>";
                       echo "</section>";
                    }else{
                        echo "<section class='formf-register'>
                        <h4>El ID no existe</h4>";
                        echo "</section>";
                    }
            }
      
            public function modificarMarca2($id_marca, $nombreN){
                $validar = mysqli_query($this->conectarBD(), "SELECT * FROM marca WHERE nombre_marca = '$nombreN'") or die("ERROR en la sentencia".mysqli_error($this->conectarBD()));
                       
                if($reg = mysqli_fetch_array($validar)){
                    echo "<section class='formf-register'>
                    <h4>Ya existe el nombre</h4>";
                    echo "</section>";
                        }else{
                          $registro = mysqli_query($this->conectarBD(), "UPDATE marca set nombre_marca = '$nombreN'
                          where id_marca=$id_marca")
                           or die("Error en la sentencia".mysqli_error($this->conectarBD()));
                           echo "<section class='formf-register'>
                           <h4>La marca ha sido modificado</h4>";
                           echo "</section>";
                        }
          }
    


    public function listarmarca(){
        $regmarcas=mysqli_query($this->conectarBD(), "SELECT * FROM marca") or die ("No se realizó con éxito el estado".
        mysqli_error($this->conectarBD()));

        echo "<table class='table1'><thead><tr><th>ID</th>
        <th>Marca</th></tr></thead>";
        echo "<tbody>";
        echo"<br><br>";
        while($marc=mysqli_fetch_array($regmarcas)){
            echo "<tr><td>".$marc[0]."</td><td>".$marc[1]."";
        }
        echo"</tbody>";
        echo "</table>";
    }
    public function cerrarConexion(){
        mysqli_close($this->conectarBD());
    }
}


?>