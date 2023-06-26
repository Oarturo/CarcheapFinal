<?php
class Vehiculo{

    private $foto_vehiculo;
    private $imagen;
    private $placa_vehiculo;
    private $precio_vehiculo;
    private $motor_vehiculo;
    private $kilometraje;
    private $id_tipo;
    private $año;
    private $serie;
    private $id_marca;
    private $id_submarca;

   
    public function inicializar($foto_vehiculo, $placa_vehiculo, $precio_vehiculo, $motor_vehiculo, $kilometraje, $id_tipo, $año, $serie,$id_submarca,$id_marca){
        
        $this -> foto_vehiculo = $foto_vehiculo;
        $this -> placa_vehiculo = $placa_vehiculo;
        $this -> precio_vehiculo = $precio_vehiculo;
        $this -> motor_vehiculo = $motor_vehiculo;
        $this -> kilometraje = $kilometraje;
        $this -> id_tipo = $id_tipo;
        $this -> año = $año;
        $this -> serie = $serie;
        $this -> id_marca = $id_marca;
        $this -> id_submarca = $id_submarca;


    }

    public function conectarBD(){

        $con=mysqli_connect("localhost","root","","carcheap") 
        or die ("Problemas con la conexion de la base de datos"); 
        return $con;
    }

    public function insert(){ 
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $agregar=mysqli_query($this -> conectarBD(),"select * from vehiculo where placa_vehiculo='".$this->placa_vehiculo."'") 
        or die (mysqli_error($this -> conectarBD()));

        if($agre=mysqli_fetch_array($agregar)){
            echo "El registro ya existe";
        }else{
        
            mysqli_query($this->conectarBD(), "INSERT INTO vehiculo (foto_vehiculo,placa_vehiculo,precio_vehiculo,motor_vehiculo,kilometraje,id_tipo,anio,serie,id_submarca,id_marca) VALUES 
            ('$this->foto_vehiculo','$this->placa_vehiculo','$this->precio_vehiculo','$this->motor_vehiculo','$this->kilometraje','$this->id_tipo','$this->año','$this->serie','$this->id_submarca','$this->id_marca')" ) or 
            die("Problemas en el insert ".mysqli_error($this->conectarBD()));
            echo 'El registro a sido exitoso';
        }
        
    }

    public function llenarListaMarca($id_marca = 0){
        $registros=mysqli_query($this->conectarBD(),"select * from marca")or die("Error en la consulta".mysqli_error($this->conectarBD()));
            while($reg=mysqli_fetch_array($registros)){
                $seleccionado = '';
                if($reg[0] == $id_marca){
                    $seleccionado = 'selected';
                }

                echo"<option value='$reg[0]' $seleccionado>$reg[1]</option>";
            }
            echo"<br>";
    }

    public function llenarListaSubMarca($id_submarca = 0){
        $registros=mysqli_query($this->conectarBD(),"select * from submarca")or die("Error en la consulta".mysqli_error($this->conectarBD()));
            while($reg=mysqli_fetch_array($registros)){
                $seleccionado = '';
                if($reg[0] == $id_submarca){
                    $seleccionado = 'selected';
                }
                echo"<option value='$reg[0]' $seleccionado>$reg[1]</option>";

            }
            echo"<br>";
    }

    public function llenarListaCategoria($id_tipo = 0){
        $registros=mysqli_query($this->conectarBD(),"select * from tipo")or die("Error en la consulta".mysqli_error($this->conectarBD()));
            while($reg=mysqli_fetch_array($registros)){
                $seleccionado = '';
                if($reg[0] == $id_tipo){
                    $seleccionado = 'selected';
                }

                echo"<option value='$reg[0]' $seleccionado>$reg[1]</option>";
            }
            echo"<br>";
    }

    public function listarVehiculo(){

        $registro = mysqli_query($this -> conectarBD(), "select vh.id_vehiculo, vh.foto_vehiculo,ma.nombre_marca, sma.nombre_submarca,vh.placa_vehiculo, vh.precio_vehiculo,vh.motor_vehiculo,vh.kilometraje,tip.nombre_tipo, vh.anio, vh.serie from vehiculo as vh inner join marca as ma on ma.id_marca = vh.id_marca inner join submarca as sma on sma.id_submarca = vh.id_submarca  inner join tipo as tip on tip.id_tipo = vh.id_tipo order by vh.id_vehiculo")
        or die ("Error en la consulta".mysqli_error($this -> conectarBD()));

        echo '<table >';

        echo '<thead><tr><th>ID</th><th>Foto</th><th>Marca</th><th>Submarca</th><th>Placa</th><th>Precio</th><th>Motor</th><th>Kilometraje</th><th>Categoria</th><th>Año</th><th>Serie</th><th>accion</th></tr></thead><tbody>';

        while ($reg=mysqli_fetch_array($registro)){
            echo '<tr><td>'.$reg['id_vehiculo'].'</td>';
            echo '<td><img src="data:image/jpeg;base64,'.base64_encode($reg['foto_vehiculo']).'"/></td>';	 
            echo '<td>'.$reg['nombre_marca'].'</td>';
            echo '<td>'.$reg['nombre_submarca'].'</td>';
            echo '<td>'.$reg['placa_vehiculo'].'</td>';	 
            echo '<td>'.$reg['precio_vehiculo'].'</td>';
            echo '<td>'.$reg['motor_vehiculo'].'</td>';
            echo '<td>'.$reg['kilometraje'].'</td>';	 
            echo '<td>'.$reg['nombre_tipo'].'</td>';
            echo '<td>'.$reg['anio'].'</td>';
            echo '<td>'.$reg['serie'].'</td>';
            echo '<td>
            <span class="botonAccion">
                <a href="modificaVehiculo.php?id='.$reg['id_vehiculo'].'">Modificar</a>
                <a href="borrarVehiculo.php?id='.$reg['id_vehiculo'].'">Eliminar</a>
                <a href="../php/agregarProducto.php">Agregar</a>
            </span>
        </td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }

    public function borrarVehiculo($id_vehiculo){ 
        mysqli_query($this -> conectarBD(), "delete from vehiculo where id_vehiculo = $id_vehiculo") or die(mysqli_error($this -> conectarBD()));
    } 

    public function modificaVehiculo($id_vehiculo){

        $registro=mysqli_query($this->conectarBD(),"SELECT * FROM vehiculo WHERE id_vehiculo='$id_vehiculo'") 
        or die("Problemas en el select".mysqli_error($this->conectarBD()));
        if ($reg=mysqli_fetch_array($registro)){
            echo'<form action="actualizarVehiculo.php" method="post" enctype="multipart/form-data">
            <div id="columna1">
                <br>
                <br>
            Imagen
            <br>
            <input  type="file" name="imagen" placeholder="imagen"  required><br><br>';
            echo'Marca
            <select name="id_marca" id="">';                
                     
                    $this->llenarListaMarca($reg['id_marca']); 
            echo'</select>';
            echo'Submarca
            <select name="id_submarca" id="">';
                
            $this->llenarListaSubMarca($reg['id_submarca']);
                 
            echo'</select>
            <br><br>
            Placa
            <input class="controlsP" type="text" name="placa_vehiculo" placeholder="Placa"  required value="'.$reg['placa_vehiculo'].'">
            Precio
            <input class="controlsP" type="number" name="precio_vehiculo" placeholder="Precio" required value="'.$reg['precio_vehiculo'].'">
            Motor
            <input class="controlsP" type="text" name="motor_vehiculo" placeholder="Precio" required value="'.$reg['motor_vehiculo'].'">
            </div>
            <div id="columna2">
                <br>
                <br>
                Kilometraje
                <input class="controlsP" type="number" name="kilometraje" placeholder="Kilometraje" required value="'.$reg['kilometraje'].'">';
                echo'Categoria
                <select name="id_tipo" id="">';
                    
                $this->llenarListaCategoria($reg['id_tipo']);
                    
                echo'</select>
                Año
                <input class="controlsP" type="number" name="año" placeholder="año" required value="'.$reg['anio'].'">
                Serie
                <input class="controlsP" type="number" name="serie" placeholder="Serie" required value="'.$reg['serie'].'">
                <input type="hidden" name="id_vehiculo" value="'.$reg['id_vehiculo'].'" >             
                <input class="botonsP" id="boton" type="submit" value="Registrar">
            </div>';                
        }
    }

    Public function actualizarVehiculo($id_vehiculo,$foto_vehiculo, $placa_vehiculo, $precio_vehiculo, $motor_vehiculo, $kilometraje, $id_tipo, $año, $serie,$id_submarca,$id_marca){ 
            $registros=mysqli_query($this->conectarBD(),"UPDATE vehiculo 
            SET id_vehiculo = '$id_vehiculo', foto_vehiculo= '$foto_vehiculo', placa_vehiculo = '$placa_vehiculo', precio_vehiculo = '$precio_vehiculo', motor_vehiculo = '$motor_vehiculo', kilometraje = '$kilometraje', id_tipo = '$id_tipo', anio = '$año', serie = '$serie', id_submarca = '$id_submarca', id_marca = '$id_marca' WHERE  id_vehiculo='$id_vehiculo'") or die("Error en la sentencia.<br>".mysqli_error($this->conectarBD())); 
    }

    public function cerrarBD(){
        mysqli_close($this->conectarBD());
    }
}
?>