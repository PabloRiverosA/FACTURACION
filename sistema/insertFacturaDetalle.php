<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
    
    $doc_numero = $_POST['numDoc'];
    $doc_tipo_codigo = $_POST['TipoDoc'];
    $doc_fecha = $_POST['fecha'];
    $usuario = 1;
    $doc_prv_rut = $_POST['proveedor'];
    $doc_total = str_replace("$","",str_replace(".","",$_POST['totalGeneral']));

    $sqlDetalle = "Select * from detallefactura WHERE  nofactura = '$doc_numero'";
    $query = mysqli_query($conection, $sqlDetalle);
    $result =mysqli_num_rows($query);
                if ($result >0) {
                  $alert='<p class="msg_error">Documento ya existe.</p>';
                  
                }else{
                  $alert='<p class="msg_error">Documento grabado con éxito.</p>';    
$sql = "INSERT INTO facturacion.factura (doc_numero, doc_tipo_codigo, doc_fecha, usuario, doc_prv_rut, doc_total) VALUES($doc_numero,$doc_tipo_codigo,'$doc_fecha',$usuario,$doc_prv_rut,$doc_total)";

//echo $sql;
$query = mysqli_query($conection, $sql);

/*
echo $_POST['numDoc']. "   -   " ;
echo $_POST['TipoDoc'] . "   -   " ;
echo $_POST['fecha'] . "   -   ";
echo $_POST['proveedor'] . "<br>";  
*/

    // Obtener los datos de la tabla
    $productos = $_POST['productoValue'];
    $cantidades = $_POST['cantidad'];
    $precios = $_POST['precio'];
    $totales = $_POST['total'];
   
    // Recorrer los datos y guardarlos
    for ($i = 0; $i < count($productos); $i++) {
        $sqlDetalle = "INSERT INTO facturacion.detallefactura (nofactura, codproducto, cantidad, preciototal) VALUES($doc_numero,$productos[$i],$cantidades[$i],$totales[$i])";

        //echo $sqlDetalle;
        $query = mysqli_query($conection, $sqlDetalle);

        //echo $productos[$i] . " - " .  $cantidades[$i] . " - " .  $precios[$i]. " - " .  $totales[$i] . "<br>";        
    }

  }
  
}  
?>

<html lang="es">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>


$( document ).ready(function() {
    $('#myModal').modal('show');
  
});

    function volver()
    {
        window.location.href = "NuevoDocumento.php";

    }

        </script>
</head>
<body>
<div class = "alert"></div>
<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;">Guardar</h4>
        </div>
        <div class="modal-body">
          <p><?php echo isset($alert) ? $alert:'';?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="volver()">Volver</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
