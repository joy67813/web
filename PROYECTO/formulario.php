<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $material = isset($_POST['material']) ? $_POST['material'] : [];
    $sugerencias = htmlspecialchars($_POST['sugerencias']);
    $opinion = htmlspecialchars($_POST['opinion']);
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Datos Enviados</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color:rgba(244, 246, 248, 0);
                margin: 0;
                padding: 0;
            }

            .container {
                background: #ffffff;
                max-width: 800px;
                margin: 40px auto;
                padding: 30px 40px;
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }

            h1, h2 {
                color: #333;
                text-align: center;
            }

            p {
                font-size: 16px;
                color: #555;
                line-height: 1.6;
            }

            .section {
                margin-top: 30px;
            }

            .material-list {
                list-style-type: disc;
                margin-left: 20px;
            }

            a.button {
                display: inline-block;
                margin-top: 20px;
                padding: 12px 24px;
                background-color: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                transition: background-color 0.3s ease;
            }

            a.button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <h1>Datos Enviados</h1>

        <div class="section">
            <h2>Información Personal</h2>
            <p><strong>Nombre de Usuario:</strong> <?php echo $nombre; ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo $correo; ?></p>
        </div>

        <div class="section">
            <h2>Material Didáctico Utilizado</h2>
            <?php if (!empty($material)): ?>
                <ul class="material-list">
                    <?php foreach ($material as $item): ?>
                        <?php 
                        switch ($item) {
                            case 'juegos':
                                echo "<li>Juegos y actividades interactivas</li>";
                                break;
                            case 'videos':
                                echo "<li>Videos educativos</li>";
                                break;
                            case 'apps':
                                echo "<li>Aplicaciones móviles educativas</li>";
                                break;
                            case 'graficos':
                                echo "<li>Gráficos y diagramas</li>";
                                break;
                            case 'textos':
                                echo "<li>Textos y libros de texto</li>";
                                break;
                        }
                        ?>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No has seleccionado ningún material.</p>
            <?php endif; ?>
        </div>

        <div class="section">
            <h2>Sugerencias</h2>
            <p><?php echo ($sugerencias ? $sugerencias : "No se proporcionaron sugerencias."); ?></p>
        </div>

        <div class="section">
            <h2>Opinión sobre la página</h2>
            <p><?php echo ($opinion ? $opinion : "No se proporcionó opinión."); ?></p>
        </div>

        <div style="text-align:center;">
            <a class="button" href="formulario.html">Volver al formulario</a>
        </div>
    </div>

    </body>
    </html>

    <?php
} else {
    // Si no se envían datos, redirigimos al formulario
    header("Location: formulario.html");
    exit();
}
?>
