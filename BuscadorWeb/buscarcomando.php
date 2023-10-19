<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

// Verificar la conexión a la base de datos
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtiene el término de búsqueda del formulario y lo divide en palabras
$termino_busqueda = $_POST['busqueda'];
$termino_busqueda = trim($termino_busqueda); // Eliminar espacios en blanco adicionales
$palabras_busqueda = explode(' ', $termino_busqueda);

// Construye la condición de búsqueda con comodines para cada palabra y combina con AND
$condiciones = [];
foreach ($palabras_busqueda as $palabra) {
    $condiciones[] = "(LOWER(c.Command) LIKE '%$palabra%' OR 
                     LOWER(c.Type_id) LIKE '%$palabra%' OR
                     LOWER(c.Description) LIKE '%$palabra%' OR
                     LOWER(t.TypeName) LIKE '%$palabra%')";
}

// Combina todas las condiciones con AND para buscar todas las palabras
$condicion_final = implode(' AND ', $condiciones);

// Realiza la consulta a la base de datos con las condiciones construidas
$consulta = "SELECT c.*, t.TypeName 
             FROM commandlinuxdb c
             LEFT JOIN typeslinuxdb t ON c.Type_id = t.id
             WHERE $condicion_final";



$resultado = $conexion->query($consulta);

// Construye la respuesta HTML con los resultados
if ($resultado->num_rows > 0) {
    echo "<h2 class='h2Resultados'>Resultados de la búsqueda:</h2>";
    echo '<div id="resultadosBusqueda" class="flex-container">';
    while ($fila = $resultado->fetch_assoc()) {
        echo '<div class="resultado">';
        echo '<span class="command">' . $fila['Command'] . '</span><br>';
        echo 'Tipo: <span class="tipo">' . $fila['TypeName'] . '</span><br>';
        echo 'Descripción: ' . $fila['Description'] . '<br>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "No se encontraron resultados.";
}




// Cierra la conexión a la base de datos
$conexion->close();
?>
