<?php

// Definim el nom del fitxer
$filename = "productes.txt";

// Comprovem si el fitxer existeix abans d'intentar llegir-lo
if (file_exists($filename)) {
    // Llegim totes les línies del fitxer en un array
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//ignorar saltos de linea y lineas vacias
    //FILE_I
    $htmlContent = "";

    // Recorrem cada línia del fitxer
    for ($i = 0; $i < count($lines); $i++) {
        //en este caso para que POST capture como un array los checkbox tienen que tener el mismo nombre!!!
        $htmlContent .="<label><input type= 'checkbox' name='opcion[]' value='$i'>" .$lines[$i]. "</label><br>";

    }


} else {
    // Si el fitxer no existeix, mostrem un missatge d'error
    echo "Error El fitxer no es troba.";
}


// Procesamos el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos el nombre de usuario
    $nameUser = $_POST['nameUser'];
    
    // Inicializamos una variable para almacenar los productos seleccionados
   
    $selectProducts = "";

    // Verificamos qué checkboxes fueron seleccionados
    if (!empty($_POST['opcion'])) {//el post tiene un array con varios checkbox que le emos pasado
        foreach ($_POST['opcion'] as $index) {  // iteramos con el bucle sobre cada checkbox y creamos el indice que utilizaremos para iterar
            $selectProducts .= ", " . $lines[$index];  // iteramos las lineas con el indice
        }
    }

    $selectProducts .='.';
    $nameUser .=$selectProducts;





} else {
    $selectProducts .='.';
    $nameUser .=$selectProducts;
}




$newFielProducts = "comandes.txt";
$openComanda = fopen($newFielProducts, "a"); 


if ($openComanda) {
    fwrite($openComanda, $nameUser . "\n"); 
    fclose($openComanda); // Cerramos el archivo después de escribir
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
    <form action="botiga.php" method="post">
        <label>Nom De l'Usuari:</label>
        <input type="text" name="nameUser" required></input><br>
        <br>
        <label>Productes de la comanda:</label><br>
        <?php echo $htmlContent; ?>
        <input type="submit" value="Enviar"></input>
    </form>
</body>
</html>



