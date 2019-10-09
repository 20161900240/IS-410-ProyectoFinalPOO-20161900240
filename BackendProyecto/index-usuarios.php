<?php
    header('Content-Type: aplication/json');
    include_once('clases/clase-usuarios.php');
    require_once('clases/clase-base-datos.php');
    $referenciaBD = new BaseDeDatos();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = new Usuarios(
                            $_POST['nombreUsuario'],
                            $_POST['correo'],
                            $_POST['verificacionCorreo'],
                            $_POST['idUsuarioPersonal'],
                            $_POST['direccion'],
                            $_POST['telefono'],
                            $_POST['contrasenaUsuario'],
                            $_POST['pais'],
                            $_POST['fechaNacimiento'],
                            $_POST['genero']
                            );
        echo $usuario->crearUsuario($referenciaBD->getBD());
    } 

    if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['id'])) {
        $_PUT = array();
       if ($_SERVER['REQUEST_METHOD'] == 'PUT') 
           parse_str(file_get_contents("php://input"), $_PUT);
            $usuario = new Usuarios(
                            $_PUT['nombreUsuario'],
                            $_PUT['correo'],
                            $_PUT['verificacionCorreo'],
                            $_PUT['idUsuarioPersonal'],
                            $_PUT['direccion'],
                            $_PUT['telefono'],
                            $_PUT['contrasenaUsuario'],
                            $_PUT['pais'],
                            $_PUT['fechaNacimiento'],
                            $_PUT['genero']
                            );
     echo $usuario->actulizarUsuario($referenciaBD->getBD(),$_GET['id']);
    
       
   
    } 


    
?>