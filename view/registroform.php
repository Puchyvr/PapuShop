<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PapuShop</title>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="contenedor-formulario">
            <form action="../controller/registro.php" method="POST">
                <h1>Registrarse</h1>
                <div>
                    <label>Nombre de usuario</label>
                    <input type="text" name="usuario" required>
                </div>
                <div>
                    <label>Contraseña</label>
                    <input type="text" name="password" required>
                </div>
                <input type="submit" value="Registrar">
            </form>
        </div>
    </main>
</body>

</html>