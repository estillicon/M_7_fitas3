<?php
//////////////////////////////////////////////////SIN ACABAR////////////////////////////////////////////////////////////
// Definim el nom del fitxer
$filename = "productes.txt";

// Comprovem si el fitxer existeix abans d'intentar llegir-lo
if (file_exists($filename)) {
    // Llegim totes les línies del fitxer en un array
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    //FILE_I
    $htmlContent = "";

    // Recorrem cada línia del fitxer
    for ($i = 0; $i < count($lines); $i++) {
        // Si la línia comença amb ##
        $htmlContent .="<label><input type= 'checkbox' name='opcion_$i' value='valor_$i'>" .$lines[$i]. "</label><br>";

    }


} else {
    // Si el fitxer no existeix, mostrem un missatge d'error
    echo "Error El fitxer no es troba.";
}




        ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>botiga</title>
</head>
<body>
    <h2>Selecciona els productes:</h2>
    <form action="tu-accion.php" method="POST">
        <?php echo $htmlContent; ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>