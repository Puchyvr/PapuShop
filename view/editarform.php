<?php 

require "../controller/auto.php";
soloAdmin();

require "../model/db.php";

$conexion = new BaseDeDatos();
$pdo = $conexion->conectar();

$id = $_GET['idR'];

$query = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$query->execute([$id]);
$seleccionar = $query->fetch();

if (!$seleccionar){
    exit("Producto no encontrado");
}

$categorias = $pdo->query("SELECT id, nombreCategoria FROM categorias")->fetchAll();
$marcas = $pdo->query("SELECT id, nombreMarca FROM marcas")->fetchAll();

?>

<form action="../controller/crud/editar.php" method="POST">
    <input type="hidden" name="id" value="<?= $seleccionar['id']; ?>">
    <label>Nombre</label>
    <input type="text" name="producto" value="<?= $seleccionar['nombreProducto']; ?>">
    <label>Descripción</label>
    <input type="text" name="descripcion" value="<?= $seleccionar['descripcionProducto']; ?>">
    <label>Talle</label>
    <input type="text" name="talle" value="<?= $seleccionar['talle']; ?>">
    <label>Color</label>
    <input type="text" name="color" value="<?= $seleccionar['color']; ?>">
    <label>Imagen</label>
    <input type="hidden" name="imagenActual" value="<?= $seleccionar['imagen']; ?>">
    <label>Precio</label>
    <input type="number" name="precio" value="<?= $seleccionar['precio']; ?>">
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
    <input type="submit" placeholder="Editar">
</form>