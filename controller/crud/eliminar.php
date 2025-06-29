<?php 

require "../auto.php";
soloAdmin();

require "../../model/db.php";

$conexion = new BaseDeDatos();
$pdo = $conexion->conectar();

$id = $_GET['idR'];

$query = $pdo->prepare("DELETE FROM productos WHERE id = ?");
$query->execute([$id]);

header("Location: ../../view/dashboard.php");
exit;

?>