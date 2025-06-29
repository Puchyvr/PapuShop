<?php 

require "../auto.php";
soloAdmin();

require "../../model/db.php";

$conexion = new BaseDeDatos();
$pdo = $conexion->conectar();

$id = $_POST['id'];

$nombreImagen = $_POST['imagenActual'] ?? "";

if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0){
    $directorio = "../../assets/img/productos/";
    if(!is_dir($directorio)){ //verificar si el directorio existe
        mkdir($directorio, 0777, true);
    }

    $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION); //Tomar el nombre del archivo y extraer su extensión
    $nombreImagen = uniqid() . "." . $extension; //evitar que se sobreescriban imagenes con el mismo nombre
    move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombreImagen); //mover el archivo al directorio y el nombre de la imagen

    $nombreImagen = "../../assets/img/productos" . $nombreImagen;

}

$query = $pdo->prepare("UPDATE productos SET
    nombreProducto = ?,
    descripcionProducto = ?,
    talle = ?,
    color = ?,
    imagen = ?,
    precio = ?,
    idCategoria = ?,
    idMarca = ? WHERE id = ?
");

$query->execute([
    $_POST['producto'],
    $_POST['descripcion'],
    $_POST['talle'],
    $_POST['color'],
    $nombreImagen,
    $_POST['precio'],
    $_POST['categoria'],
    $_POST['marca'],
    $id
]);

header("Location: ../../view/dashboard.php");
exit;

?>