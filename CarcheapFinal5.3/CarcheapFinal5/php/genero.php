<?php

    class Genero{

        
        private $nombreU;
        private $apellidoP;
        private $apellidoM;
        private $codigogenero;
        private $correo;
        private $clave;
        private $tel;
        private $dir;

        public function inicializar ($nombreU, $apellidoP, $apellidoM, $codigogenero, $correo, $clave, $tel, $dir){

            $this->nombreU = $nombreU;
            $this->apellidoP = $apellidoP;
            $this->apellidoM = $apellidoM;
            $this->codigogenero = $codigogenero;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->tel = $tel;
            $this->dir = $dir;
        }
        public function conectarBD(){
            $con = mysqli_connect("localhost","root","","carcheap")
            or die ("Probelmas con la conexion");
            return $con;
        }
        public function registrate(){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM usuarios WHERE correo=".$this->correo."")
            or die("Error en la consulta".mysqli_error($this->conectarBD()));
            if($regis=mysqli_fetch_array($registros)){
                echo '<script> 
                alert("El correo ya existe"); 
                window.location="crearcuenta.php"
            </script>';
            }else{
            mysqli_query($this->conectarBD(), "INSERT INTO usuarios (nombreU,apellidoP,apellidoM, codigogenero,correo,clave, tel, dir)
            VALUES('" . $this->nombreU."','" . $this->apellidoP . "','".$this->apellidoM."','".$this->codigogenero."','" . $this->correo . "','" . $this->clave. "','" . $this->tel. "','".$this->dir."')")
                or die("Problemas con el insert" . mysqli_error($this->conectarBD()));
            
                echo "Registro completo";
            }
        }

        public function llenarGenero(){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM genero")or die("Error en la consulta".mysqli_error($this->conectarBD()));
            while($reg=mysqli_fetch_array($registros)){
                echo"<option value='$reg[0]'>$reg[1]</option>";
            }
            echo"<br>";
        }
        public function listarGenero(){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM genero") or die ("Error en la consulta".mysqli_error($this->conectarBD()));
            echo'<table border="1" class="tablalistado">';
            echo'<tr><th>Codigo</th><th>Nombre del genero</th></tr>';
            while($reg=mysqli_fetch_array($registros)){
                echo'<tr><td>'.$reg[0].'</td>';
                echo'<td>'.$reg[1].'</td></tr>';
            }
            echo"</table>";
        }
        
        public function cerrarBD(){
            mysqli_close($this->conectarBD());
        }
    }
?>