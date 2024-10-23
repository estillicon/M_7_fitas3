<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex31</title>
</head>
<body>
    <h1>PROCESSA CONTACTES</h1>
    
    <?php
     echo "<table border='1'>";
     echo "<tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Teléfono</th></tr>";
 
     $agenda = "contactes31.txt";
 
     // Verificar si el archivo existe
     if (file_exists($agenda)) {
         // Leer cada línea del archivo
         $contactes = file($agenda);
 
       
        
         foreach ($contactes as $contacte) {
            // Separar los datos por coma y eliminar espacios adicionales con trim()
            $datos = explode(",", trim($contacte));

            // Crear una fila para cada contacto
            echo "<tr>";
            
            // Usar un bucle for para crear celdas de forma dinámica
            for ($i = 0; $i < count($datos); $i++) {
                echo "<td>" . htmlspecialchars($datos[$i]) . "</td>"; // Asegurarse de que los caracteres especiales se impriman correctamente
            }

            echo "</tr>"; // Cerrar la fila
        }
        
        
        
        //cerrar la tabla
        echo "</table>";
    } else {
        //salida por si no existe el archivo
        echo "no existe el archivo";
    }

    $contactesTrans = file($agenda);
    $NouFitxe = "";

// Procesar cada línea del archivo original
foreach ($contactesTrans as $contacte) {
    // Separar los datos por coma y eliminar espacios innecesarios
    $datos = explode(",", trim($contacte));
    
    // Unir los datos procesados en una nueva línea
    // guardamos en una variable nueva el fixero camviando las , por los # y un salto de linea
    $NouFitxe .= implode("#", $datos) . "\n";  // Cada línea con los mismos datos separados por comas
}

// Escribir el contenido en un nuevo archivo "contactes31b.txt" con la nueva variable y sus modificaciones
file_put_contents("contactes31b.txt", $NouFitxe);

// Mensaje de confirmación
echo "El nuevo archivo 'contactes31b.txt' ha sido creado con éxito.";
?>


    
    
</body>
</html>