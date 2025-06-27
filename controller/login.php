<?php 

session_start();
require "../model/db.php";

$conexion = new BaseDeDatos();
$pdo = $conexion->conectar();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Seleccionar los valores de la tabla, si coincide con el nombre del formulario
    $query = $pdo->prepare("SELECT usuarios.nombreUsuario, usuarios.password, roles.nombreRol FROM usuarios
                            JOIN roles ON usuarios.idRol = roles.id
                            WHERE usuarios.nombreUsuario = ?");
    $query->execute([$usuario]);
    $login = $query->fetch();

    if($login){
        $passwordBD = $login['password'];
        $Verificar = false;

        if(substr($passwordBD,0,4) ==='$2y$' && password_verify($password, $passwordBD)){
            $Verificar = true; //Contraseña con hash
        }
        elseif ($password === $passwordBD){ //Contraseña sin hash
            $Verificar = true;
        }
        if($Verificar){ //Crear una sesión de usuario si las contraseñas estan bien
            $_SESSION['usuario'] = [
                'id' => $login['id'],
                'nombre' => $login['nombreUsuario'],
                'rol' => $login['nombreRol']
            ];

            //Comprobar los roles del usuario (Administrador o Usuario)
            if($login['nombreRol'] === 'Administrador'){
                header("Location: ../view/dashboard.php");
            }else{
                header("Location: ../view/tienda.php");
            }
            exit;
        }else{
            echo "Contraseña incorrecta";
        }
    }else{
        echo "Usuario no encontrado";
    }

}
?>