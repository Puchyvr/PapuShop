<?php 

function soloAdmin(){
    session_start();
    if(!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Administrador'){
        header("Location: ../view/loginform.php");
        exit;
    }
}

function soloUsuario(){
    session_start();
    if(!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Usuario'){
        header("Location: ../view/loginform.php");
        exit;
    }
}

?>