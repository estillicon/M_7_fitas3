<?php
session_start();

// Reiniciar la sesión si se solicita
if (isset($_GET['reiniciar'])) {
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header("Location: ex32.php"); // Redirige a la misma página
    exit();
}

if (isset($_POST['comentari']) &&  isset($_POST['separador'])) {
    $comentari = $_POST['comentari'];
    $separador = $_POST['separador'];

    // miramos si ya existe el array en la sesión
    if (!isset($_SESSION['comentari']) && !isset($_SESSION['separador'])) {
        $_SESSION['comentari'] = []; // Inicializamos el array si no existe
        $_SESSION['separador'] = []; // Inicializamos el array si no existe
        

    }
        $_SESSION['comentari'][] = $comentari;
        $_SESSION['separador'][]= $separador;
    
}else{
    echo"Rellena los campos";
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
    <form method="POST" action="ex32.php">
        Comentari:<br><textarea name="comentari" rows="4" cols="50" required></textarea><br>
        Separador:<br> <input type="text" name="separador" required><br>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <br>
    <!-- Enlace para reiniciar la sesión -->
    <a href="ex32.php?reiniciar=true">Reiniciar la sesión</a>

    <?php
    $archivoAbiertoTrans ="";
    $NouFitxe = "comentaris.txt";
    $archivoAbierto = fopen($NouFitxe, "a");//abrimos el archivo y si no existe lo creamos
    if ($archivoAbierto) {
          // Recorremos las sesiones de "comentari" y "separador" para escribir en el archivo
          if (isset($_SESSION['comentari']) && isset($_SESSION['separador'])) {
            $count = count($_SESSION['comentari']);
            for ($i = 0; $i < $count; $i++) {
                // Escribimos el comentario y el separador en el archivo
                $datos = str_replace(' ', $_SESSION['separador'][$i], $_SESSION['comentari'][$i]);
                fwrite($archivoAbierto, $datos . "\n"); // Escribir los datos con los cambios
            }
        }
        fclose($archivoAbierto);
    } else {
        echo "No se pudo abrir el archivo.";
    }
        


    ?>
</body>
</html>
