<?php
// Definim el nom del fitxer
$filename = "ex34.txt";

// Comprovem si el fitxer existeix abans d'intentar llegir-lo
if (file_exists($filename)) {
    // Llegim totes les línies del fitxer en un array
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    //FILE_IGNORE_NEW_LINES ignora els salts de linea en el array resultant
    //FILE_SKIP_EMPTY_LINES ignora les lineas en blanc
    // Variable per emmagatzemar el contingut HTML processat
    $htmlContent = "";

    // Recorrem cada línia del fitxer
    for ($i = 0; $i < count($lines); $i++) {
        // Si la línia comença amb ##
        if (strpos(trim($lines[$i]), '##') === 0) {
            // Netegem el símbol ##
            $title = trim(str_replace('##', '', $lines[$i]));

            // Si hi ha una línia següent, l'afegim també al títol
            if (isset($lines[$i + 1]) && !empty(trim($lines[$i + 1]))) {
                $title .= " " . trim($lines[$i + 1]);//el trim elimina els espais en blanc o caràcters especials de principi i final d'una cadena de text
                // Ens saltem la següent línia perquè ja l'hem processat
                $i++;
            }

            // Afegim el títol format com un <h1>
            $htmlContent .= "<h1>$title</h1>\n";
        } else {
            // Si no és un títol, simplement afegim la línia tal qual
            $htmlContent .= $lines[$i] . "<br>\n";
        }
    }

    // Mostrem el contingut HTML
    ?>
    <!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ex34</title>
    </head>
    <body>
        <?php
        // Imprimim el contingut modificat
        echo $htmlContent;
        ?>
        <br>
    </body>
    </html>
    <?php
} else {
    // Si el fitxer no existeix, mostrem un missatge d'error
    echo "Error: El fitxer 'ex34.txt' no s'ha trobat.";
}
?>




<!--ejercicio con explode y inplode-->
<?php
// Definim el nom del fitxer
$filename = "ex34.txt";

// Comprovem si el fitxer existeix abans d'intentar llegir-lo
if (file_exists($filename)) {
    // Llegim tot el contingut del fitxer
    $content = file_get_contents($filename);

    // Dividim el contingut en línies amb explode
    $lines = explode("\n", $content);

    // Array per emmagatzemar el contingut processat
    $processedContent = [];

    // Recorrem cada línia
    for ($i = 0; $i < count($lines); $i++) {
        // Si la línia comença amb ##
        if (strpos(trim($lines[$i]), '##') === 0) {
            // Netegem el símbol ##
            $title = trim(str_replace('##', '', $lines[$i]));

            // Si hi ha una línia següent, l'afegim també al títol
            if (isset($lines[$i + 1]) && !empty(trim($lines[$i + 1]))) {
                $title .= " " . trim($lines[$i + 1]);
                // Ens saltem la següent línia perquè ja l'hem processat
                $i++;
            }

            // Afegim el títol processat com un <h1> a l'array
            $processedContent[] = "<h1>$title</h1>";
        } else {
            // Si no és un títol, afegim la línia amb un <br>
            $processedContent[] = $lines[$i] . "<br>";
        }
    }

    // Utilitzem implode per unir tot l'array en un sol string HTML
    $finalContent = implode("\n", $processedContent);

    // Mostrem el contingut HTML
    ?>
    <!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ex34</title>
    </head>
    <body>
        <h3>Segona forma(explode,implode y file_get_contents)</h3><br>
        <?php
        // Imprimim el contingut final
        echo $finalContent;
        ?>
    </body>
    </html>
    <?php
} else {
    // Si el fitxer no existeix, mostrem un missatge d'error
    echo "Error: El fitxer 'ex34.txt' no s'ha trobat.";
}
?>

