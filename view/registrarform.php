<?php 

require "../controller/auto.php";
soloAdmin();

require "../model/db.php";

$conexion = new BaseDeDatos();
$pdo = $conexion->conectar();

$categorias = $pdo->query("SELECT id, nombreCategoria FROM categorias")->fetchAll();
$marcas = $pdo->query("SELECT id, nombreMarca FROM marcas")->fetchAll();

?>

<form action="../controller/crud/crear.php" method="POST">
    <label>Nombre</label>
    <input type="text" name="producto">
    <label>Descripción</label>
    <input type="text" name="descripcion">
    <label>Talle</label>
    <input type="text" name="talle">
    <label>Color</label>
    <input type="text" name="color">
    <label>Imagen</label>
    <input type="file" name="imagen">
    <label>Precio</label>
    <input type="number" name="precio">
    <label>Categoria</label>
    <select name="categoria">
        <?php foreach($categorias as $seleccionar){ ?>
            <option value="<?= $seleccionar['id']?>"><?= $seleccionar['nombreCategoria']?></option>
        <?php } ?>
    </select>
    <label>Marca</label>
        <select name="marca">
        <?php foreach($marcas as $seleccionar){ ?>
            <option value="<?= $seleccionar['id']?>"><?= $seleccionar['nombreMarca']?></option>
        <?php } ?>
    </select>
    <input type="submit" placeholder="Guardar">
</form>