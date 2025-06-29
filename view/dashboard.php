<?php 

require "../controller/auto.php";
soloAdmin();

require "../model/db.php";

$conexion = new BaseDeDatos();
$pdo = $conexion->conectar();

$query = $pdo->query("SELECT id, nombreProducto, precio FROM productos ORDER BY id DESC LIMIT 10");
$productos = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PapuShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <h1>Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Editar</th>
                <th>Modificar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $selecconar) {?>
            <tr>
                <th><?= $selecconar['nombreProducto']; ?></th>
                <th><?= $selecconar['precio']; ?></th>
                <th><a href=""><i class="bi bi-pencil"></i></a></th>
                <th><a href=""><i class="bi bi-trash3-fill"></i></a></th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="registrarform.php">Formulario de registro</a>
</body>
</html>
