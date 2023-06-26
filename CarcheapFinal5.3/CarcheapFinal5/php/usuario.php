<?php

class Usuario{

    private $nombreU;
    private $apellidoP;
    private $apellidoM;
    private $codigogenero;
    private $correo;
    private $clave;
    private $tel;
    private $dir;

    public function inicializar($nombreU, $apellidoP, $apellidoM, $codigogenero, $correo, $clave, $tel, $dir){

        $this ->nombreU = $nombreU;
        $this ->apellidoP = $apellidoP;
        $this ->apellidoM = $apellidoM;
        $this ->codigogenero = $codigogenero;
        $this ->correo = $correo;
        $this ->clave = $clave;
        $this ->tel = $tel;
        $this ->dir = $dir;
    }
    public function conectarBD(){

        $conectar=mysqli_connect("localhost", "root", "", "carcheap") or die ("Problemas con la conexion a la base de datos".mysqli_error($this->conectarBD()));
        return $conectar;
    }
    public function insertar(){
        
        mysqli_query($this->conectarBD(),"INSERT INTO usuarios (nombreU, apellidoP, apellidoM, codigogenero, correo, clave, tel, dir) values ('".$this->nombreU."', '".$this->apellidoP."', '".$this->apellidoM."', '".$this->codigogenero."','".$this->correo."','".$this->clave."','".$this->tel."','".$this->dir."')") 
        or die( "Problemas en el insert".mysqli_error($this->conectarBD()));
        echo "<section class='formf-register'>
        <h4>Usuario Ingresado</h4>";
         echo "</section>";
        
         
    }
    
    public function eliminar($id){
        $registro=mysqli_query($this->conectarBD(), "SELECT nombreU, apellidoP, apellidoM, codigogenero, correo, clave, tel, dir FROM usuarios where id=$id") 
        or die (mysqli_error($this->conectarBD()));

        if($reg=mysqli_fetch_array($registro)){
            echo "<section class='formf-register'>
            <h4>Eliminar usuario</h4><br>";
            echo "Nombre:".$reg['nombreU']."<br>";
            echo "Apellido paterno:".$reg['apellidoP']."<br>";
            echo "Apellido materno:".$reg['apellidoM']."<br>";
            echo "Sexo:".$reg['codigogenero']."<br>";
            echo "Correo:".$reg['correo']."<br>";
            echo "clave:".$reg['clave']."<br>";
            echo "Telefono:".$reg['tel']."<br>";
            echo "Direccion:".$reg['dir']."<br>";
            mysqli_query($this->conectarBD(), "DELETE FROM usuarios WHERE id=$id") or die ("Error en el delete".mysqli_error($this->conectarBD()));
            echo "Usuario eliminado";
            
        }else {
            echo"No existe usuario con dicho codigo";
        }
    }
    public function consultar($correo){
        $consultar=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios WHERE correo='$correo'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));

        if ($consul=mysqli_fetch_array($consultar)){
            echo"<b>El usuario</b><br><br>";
                    echo"<b>nombre: ".$consul['nombreU']."</b><br>";  
                    echo"<b>Apellido paterno: ".$consul['apellidoP']."</b><br>";
                    echo"<b>Apellido materno: ".$consul['apellidoM']."</b><br>";
                    echo"<b>Sexo: ".$consul['codigogenero']."</b><br>";
                    echo"<b>Correo: ".$consul['correo']."</b><br>";
                    echo"<b>Contraseña: ".$consul['clave']."</b><br>";
                    echo"<b>Telefono: ".$consul['tel']."</b><br>";
                    echo"<b>Direccion: ".$consul['dir']."</b><br>";
        }else{
            echo "No existe el usuario con dicho email";
        }
    }
    public function tabla(){
        $registro=mysqli_query($this->conectarBD(), "SELECT * FROM usuarios") or die ("Fallo en la conexion".mysqli_error($this->conectarBD()));
        echo "<br><br>";
        echo "<table class='table1'><thead><th>ID usuario</th>
        <th>Usuario</th><th> Apellido paterno</th><th>Apellido Materno</th><th> Sexo</th><th>Correo</th><th>clave</th>><th>Telefono</th><th>Direccion</th>";
        echo "<tbody>";
        while($reg=mysqli_fetch_array($registro)){
            echo "<tr><td>".$reg[0]."</td><td>".$reg[1]."</td><td>".$reg[2]."</td><td>".$reg[3]."</td><td>".$reg[4]."</td><td>".$reg[5]."</td><td>".$reg[6]."</td><td>".$reg[7]."</td><td>".$reg[8]."";
        }

    }
    public function cerrarbd(){
        mysqli_close($this ->conectarBD());
    }

}

?>