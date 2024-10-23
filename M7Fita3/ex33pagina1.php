<?php


// Inicializamos la variable por defecto para evitar errores.
$textAfagir = "";

// Verificar si se envió el formulario
if (isset($_POST['textAfagir'])) {
    $textAfagir = $_POST['textAfagir'];

  

    // Solo abrir y escribir en el archivo si $textAfagir tiene un valor
    if (!empty($textAfagir)) {
        $NouFitxe = "ex33.txt";
        $archivoAbierto = fopen($NouFitxe, "a"); // Abrimos el archivo en modo "a" (solo escribir)
        //Al abrir el ficherito con a el puntero se coloca al final de los datos que ya existen

        if ($archivoAbierto) {
            fwrite($archivoAbierto, $textAfagir . "\n" . str_repeat('-', 50) . "\n"); // Escribir los datos escritos y una linea de guiones como separador
            fclose($archivoAbierto); // Cerramos el archivo después de escribir
        }
    }
      // Redirigir para evitar la reescritura si se recarga la página
      header("Location: ex33pagina1.php");
      exit(); // Asegúrate de que el script se detenga después de la redirección
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

    <h2>INTRODUEIX DADES</h2>
    <br>
    <!-- Botón para reiniciar la sesión -->
   
    <form method="POST" action="ex33pagina1.php">
        Comentari:<br><textarea name="textAfagir" rows="4" cols="50" required></textarea><br><!--textarea para meter los comentarios que van a la variable "textAfagir"-->
        <br>
        <input type="submit" value="Guardar">
        <br>
    </form>

    <?php
    // Leer y mostrar el contenido del archivo
    $NouFitxe = "ex33.txt";

    $archivoAbierto = "ex33.txt"; // Nombre del archivo

if (file_exists($archivoAbierto)) {
    $contenido = file_get_contents($archivoAbierto); // abre el archivo especificado en modo lectura
    echo "<h3>Contenido del archivo:</h3>";
    echo nl2br($contenido); //nl2br Convierte saltos de línea a <br>
} else {
    echo "El archivo aún no contiene datos.";
}

    ?>
</body>
</html>
