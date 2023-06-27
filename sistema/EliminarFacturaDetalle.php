<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    
    $doc_numero = $_GET['id'];
        
    $sqlDetalle = "delete from detallefactura WHERE  nofactura = '$doc_numero'";
    $query = mysqli_query($conection, $sqlDetalle);
  

    $sql = "delete  from factura WHERE  doc_numero = '$doc_numero'";
    $query = mysqli_query($conection, $sql);

    $query = mysqli_query($conection, $sql);
    if (!$query) {
        die("Error en la consulta: " . mysqli_error($conection));
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
        window.location.href = "ListaDocumentos.php";

    }

        </script>
</head>
<body>

<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;">Eliminar</h4>
        </div>
        <div class="modal-body">
          <p>Registro eliminado de forma exitosa!.</p>
         
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