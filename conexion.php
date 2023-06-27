<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'facturacion';
$username = 'root';
$password = '';

try {
    // Crear una nueva conexión PDO
    $BD = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Habilitar el modo de excepción para reportar errores
    $BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conection = mysqli_connect($host,$username,$password,$dbname);
    if(!$conection)
    {
        echo "Error en la conexión";

    }

} catch (PDOException $e) {
    // Manejo de errores de conexión
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
?>