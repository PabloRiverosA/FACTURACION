<?php
include "../conexion.php";

$proveedorId = $_GET['proveedorId'];

$query = mysqli_query($conection, "SELECT * FROM producto WHERE proveedor_id = '$proveedorId'");
$productos = array();
while ($producto = mysqli_fetch_array($query)) {
  $productos[] = array(
    "codproducto" => $producto['codproducto'],
    "descripcion" => $producto['descripcion']
  );
}

echo json_encode($productos);
?>
