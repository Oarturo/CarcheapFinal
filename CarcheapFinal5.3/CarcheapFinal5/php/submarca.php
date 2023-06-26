<?php
class submarca{
    private $id_submarca;
    private $nombre_submarca;
    private $id_marca;
    public function inicializar ($id_submarca, $nombre_submarca, $id_marca){
        $this->id_submarca= $id_submarca;
        $this->nombre_submarca= $nombre_submarca;
        $this->id_marca= $id_marca;
        
      }
    public function conectarBD(){
        $conectar=mysqli_connect("localhost", "root", "", "carcheap") or die ("No se realizó con éxito la conexión".
        mysqli_error($this->conectarBD()));
        return $conectar;
    }

    public function ingresarSubmarca(){
        mysqli_query($this->conectarBD(),"INSERT INTO submarca(id_submarca,nombre_submarca,id_marca) values ('$this->id_submarca', '$this->nombre_submarca', '$this->id_marca')") 
        or die( "Problemas en el insert".mysqli_error($this->conectarBD()));
        echo "<section class='formf-register'>
        <h4>Tipo de vehiculo agregado</h4>";
         echo "</section>";
      }

      public function borrarSubmarca($id_submarca){
        $registro=mysqli_query($this->conectarBD(),"SELECT * FROM submarca WHERE id_submarca='$id_submarca'")or die (mysqli_error($this->conectarBD()));
    
        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar submarca de auto</h4><br>";
            echo "ID:".$reg[0]."<br>";
            echo "Submarca:".$reg[1]."<br>";
            echo "ID Marca:".$reg[2]."<br>";

          
            
            
            mysqli_query($this->conectarBD(), "DELETE FROM submarca WHERE id_submarca = '$id_submarca'") or die (mysqli_error($this->conectarBD()));
            echo "Submarca eliminada";
            echo "</section>";
            }
            else{
             echo "<section class='formf-register'>
             <h4>No existe Submarca con ese ID</h4>";
              echo "</section>";
            }
            
            }

            public function consultarSubmarca($id_submarca){
          
                $registro=mysqli_query($this->conectarBD(),"SELECT id_submarca,nombre_submarca,id_marca from submarca where id_submarca='$id_submarca'")or die (mysqli_error($this->conectarBD()));
                if ($reg=mysqli_fetch_array($registro)){

                    echo "<section class='formf-register'>
                    <h4>Consulta</h4><br>";
                    echo "ID:".$reg['id_submarca']."<br>";
                    echo "Submarca:".$reg['nombre_submarca']."<br>";
                    echo "ID marca:".$reg['id_marca']."<br>";
                    echo "</section>";

                        
                    }else {
                        echo "<section class='formf-register'>
                        <h4>No existe submarca con ese ID</h4>";
                         echo "</section>";
                       }
              }

              public function modificarSubmarca($id_submarca){
                $validar = mysqli_query($this->conectarBD(), "SELECT * FROM submarca where id_submarca='$id_submarca'") or 
                die("Problemas con el buscar".mysqli_error($this->conectarBD()));
        
            if($reg = mysqli_fetch_array($validar)){
                
                echo "<section class='formf-register'>
                        <h4>Modificar</h4>";
                echo "<form action = '../php/ControlSubmarca.php' method = 'post'>
                        ID:
                        <input type = 'number' class='controlf' name = 'id_submarca' value = ".$reg['id_submarca']." readonly><br>
                        Nombre de submarca:
                        <input type = 'text' class='controlf' name = 'nombre_submarca' value = ".$reg['nombre_submarca']."><br>";
      
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
      
            public function modificarSubmarca2($id_submarca, $nombreN){
                $validar = mysqli_query($this->conectarBD(), "SELECT * FROM submarca WHERE nombre_submarca = '$nombreN'") or die("ERROR en la sentencia".mysqli_error($this->conectarBD()));
                       
                if($reg = mysqli_fetch_array($validar)){
                    echo "<section class='formf-register'>
                    <h4>Ya existe el nombre</h4>";
                    echo "</section>";
                        }else{
                          $registro = mysqli_query($this->conectarBD(), "UPDATE submarca set nombre_submarca = '$nombreN'
                          where id_submarca=$id_submarca")
                           or die("Error en la sentencia".mysqli_error($this->conectarBD()));
                           echo "<section class='formf-register'>
                           <h4>La submarca ha sido modificado</h4>";
                           echo "</section>";
                        }
          }
    

          public function listarMarca()
          {
              $marcas = mysqli_query($this->conectarBD(), "SELECT * FROM marca") or die("Problemas con el listado" . mysqli_error($this->conectarBD()));
              while ($mar = mysqli_fetch_array($marcas)) {
                  echo "<option value = '" . $mar[0] . "'>" . $mar[1] . "</option>";
        
        }
    }

    public function tablaSubmarca(){
        $regsubmarca=mysqli_query($this->conectarBD(), "SELECT * FROM submarca s join marca m where s.id_marca = m.id_marca") or die ("No se realizó con éxito el estado".
        mysqli_error($this->conectarBD()));
        echo "<br><br>";
        echo "<table class='table1'><thead><th>ID Submarca</th>
        <th>Submarca</th><th>Marca</th>";
        echo "<tbody>";
        while($submarc=mysqli_fetch_array($regsubmarca)){
            echo "<tr><td>".$submarc[0]."</td><td>".$submarc[1]."</td><td>".$submarc[4]."";

        }
        
     
        echo"</tbody>";
        echo"</thead>";
        echo "</table>";
    }
    public function cerrarConexion(){
        mysqli_close($this->conectarBD());
    }
}


?>