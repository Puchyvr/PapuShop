<?php

require '../model/db.php';

//Acceder a la conexión a la BD
$conexion = new BaseDeDatos();
$pdo = $conexion->conectar();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Verificar si hay campos vacios
    if(empty($usuario) || empty($password)){
        die("Completa todos los datos");
    }

    //Cifrar la contraseña y asignar el rol de usuario
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $idRol = 2;
    
    //Comprobar si el usuario ya existe
    $query = $pdo->prepare("SELECT id FROM usuarios WHERE nombreUsuario = ?");
    $query->execute([$usuario]);

    if($query->fetch()){
        die("Este nombre de usuario ya esta en uso, utiliza otro");
    }

    //Agregar el nuevo usuario

    $query = $pdo->prepare("INSERT INTO usuarios (nombreUsuario, password, idRol) VALUES (?, ?, ?)");
    $query->execute([$usuario, $hash, $idRol]);

    header("Location: ../view/loginform.php");
    exit;
}

?>