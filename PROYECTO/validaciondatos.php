<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$usuarioCorrecto = "joy";
$contrasenaCorrecta = "12345";

$usuarioIngresado = "";
$mensajeError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuarioIngresado = $_POST['usuario'] ?? '';
    $contrasenaIngresada = $_POST['contrasena'] ?? '';

    if ($usuarioIngresado === $usuarioCorrecto) {
        if ($contrasenaIngresada === $contrasenaCorrecta) {
            header("Location: iconomenu.html");
            exit;
        } else {
            $mensajeError = "Contraseña incorrecta.";
        }
    } else {
        $mensajeError = "Usuario incorrecto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Didáctico</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="formulario"> 
        <h1>Inicio de sesion</h1>
        <form method="post" action="">
            <div class="usuario">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" value="<?= htmlspecialchars($usuarioIngresado) ?>" required>
            </div>
            <div class="contrasena">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $mensajeError): ?>
            <p style="color:red;"><?= $mensajeError ?></p>
        <?php endif; ?>
    </div>
</body>
</html>


</body>
</html>