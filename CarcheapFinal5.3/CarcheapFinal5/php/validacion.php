<?php

session_start();

if (isset($_POST['correo']) && isset($_POST['clave'])) {
    $db = new mysqli('localhost', 'root', '', 'carcheap');

    $stmt = $db->prepare('SELECT nombreU, adm FROM usuarios WHERE correo = ? AND clave = ?');
    $stmt->bind_param('ss', $_POST['correo'], $_POST['clave']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        }
            if (substr($row['correo'], -17) == '@administrador.com')
        $_SESSION['correo'] = $_POST['correo'];
        $_SESSION['nombreU'] = $row['nombreU'];
        if ($row['adm']) {
            header('Location: ../html/Index_admin.php');
        } else {
            header('Location: ../html/Index_cliente.php');
        }
        exit;
    } else {
        header('Location: ../html/Formulario_sesion.html');
        $_SESSION['error_message'] = "Error en la contraseña o correo electrónico";
}
    
}

$conn->close();
?>