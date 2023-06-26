<?php

class Modi{

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
    public function modificarDatos($correo) {
        $registros=mysqli_query($this->conectarBD(),"SELECT * FROM usuarios WHERE correo='$correo'") or
        die("Problemas en el select:".mysqli_error($this->conectarBD()));
        if ($reg=mysqli_fetch_array($registros)){
            echo"<br><form action='controlModi.php' method='post'>
            Nombre
            <input class='controlsC' type='text' name='nombreU' value=".$reg[1]." required><br><br>
            Apellido paterno
            <input class='controlsC' type='text' name='apellidoP' value=".$reg[2]." required><br><br>
            Apellido materno
            <input class='controlsC' type='text' name='apellidoM'  value=".$reg[3]." required><br><br>
            SEXO:";
                echo"<select class='controlsC' name='codigogenero' class='input'>";
                          include 'genero.php';
                               $gen = new Genero();
                               $gen -> llenarGenero();
                               $gen -> cerrarBD();
                    echo"</select><br><br>
                    Correo
            <input class='controlsC' type='email' name='correo'  value=".$reg[5]." required>
            Contraseña
            <input class='controlsC' type='password' name='clave'  value=".$reg[6]." required>
            Telefono
            <input class='controlsC' type='number' name='tel'  value=".$reg[7]." required>
            Direccion
            <input class='controlsC' type='text' name='dir'  value=".$reg[8]." required>
                <br><br>
            <input class='controlsC' type='hidden' name='modi' value='2'><br><br>
          <div class='boton-enviar1'>
            <input class='botonsC' type='submit' value='Enviar'>
          </div>
        </form>";
        }else{
            echo "No existe un usuario con dicho correo";
        }
    
    }

    public function modificar2($nombreU,$apellidoP,$apellidoM, $codigogenero, $correo, $clave, $tel, $dir){
        mysqli_query($this->conectarBD(), "UPDATE usuarios SET nombreU = '$nombreU', apellidoP = '$apellidoP', apellidoM = '$apellidoM', codigogenero = '$codigogenero', correo = '$correo', clave = '$clave', tel='$tel', dir='$dir'  WHERE correo = '$correo'") or die("Error al modificar: " . mysqli_error($this->conectarBD()));
        echo '<div class="falloPublicar">Los datos fueron actualizados<br><button><a href="../html/usuario.html">Aceptar</a></button></div>';

    }
    public function cerrarbd(){
        mysqli_close($this ->conectarBD());
    }

}

?>