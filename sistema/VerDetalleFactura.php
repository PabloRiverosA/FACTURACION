<?php
	include "../conexion.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $valorID =  $_GET['id'];
        
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<?php include "include/scripts.php"; ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 	<title>Sistema de facturación</title>

	

	<script>
		function verDoc()
		{
			$('#myModal').modal('show');

		}
		</script>
</head>
<body>
	<?php include "include/header.php"; 
			//require_once 'functions.php';
	?>
	<section id="container">
		<div><h1>Detalle de Documentos</h1></div>
		
		<table>
			<thead>
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Total Facturacion</th>
				</tr>
			</thead>	
		<?php
                    $sql  = "SELECT C.descripcion, C.precio,  A.cantidad, A.preciototal FROM facturacion.detallefactura A 
                    INNER JOIN facturacion.FACTURA B ON A.nofactura = B.doc_numero
                    INNER JOIN facturacion.producto C ON A.codproducto = C.codproducto
                    WHERE A.nofactura = $valorID ";


					$query = mysqli_query($conection,$sql);
                                        

					$result = mysqli_num_rows($query);
					if ($result >0) {
						while ($data = mysqli_fetch_array($query)) 
							{
								?>
									<tbody>
										<tr>
											<td><?php echo $data["descripcion"]; ?></td>
											<td><?php echo $data["precio"]; ?></td>
											<td><?php echo $data["cantidad"]; ?></td>
											<td><?php echo $data["preciototal"]; ?></td>
											
										</tr>
									</tbody>
								<?php	
							}
						}
					?>	

			
		</table>
        <a href="ListaDocumentos.php" class="btn_new">Volver</a>
	</section>
	<?php include "include/footer.php"; ?>
    
</body>

 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#28a745;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;">Guardar</h4>
        </div>
        <div class="modal-body">
		<iframe src="VerDetalleFactura.php" title="description" style="width:100%; height:100%;"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="volver()">Volver</button>
        </div>
      </div>
      
    </div>
  </div>
</html>


