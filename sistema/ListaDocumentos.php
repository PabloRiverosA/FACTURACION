<?php
	include "../conexion.php"
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
		<div><h1>Listado de Documentos</h1></div>
		<a href="NuevoDocumento.php" class="btn_new">Crear Documento</a>
		<table>
			<thead>
				<tr>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Proveedor</th>
					<th>Fecha</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
			</thead>	
		<?php
					$query = mysqli_query($conection,"SELECT B.tip_descripcion,A.doc_tipo_codigo, A.doc_numero, 
											A.doc_fecha, A.doc_total, C.prv_nombre 
											FROM factura A INNER JOIN tipo_documento B ON A.doc_tipo_codigo = B.tip_id 
											INNER JOIN proveedor C ON A.doc_prv_rut = C.prv_rut");
					$result = mysqli_num_rows($query);
					if ($result >0) {
						while ($data = mysqli_fetch_array($query)) 
							{
								?>
									<tbody>
										<tr>
											<td><?php echo $data["tip_descripcion"]; ?></td>
											<td><?php echo $data["doc_numero"]; ?></td>
											<td><?php echo $data["prv_nombre"]; ?></td>
											<td><?php echo $data["doc_fecha"]; ?></td>
											<td><?php echo $data["doc_total"]; ?></td>
											<td>
												
												<a href="VerDetalleFactura.php?id=<?php echo $data["doc_numero"];?>">
												<img  src="img/verDetalle.png" width="20" height="20" title="Ver Detalle de Factura" />
												</a>
												|
												<a  href="EliminarFacturaDetalle.php?id=<?php echo $data["doc_numero"];?>">Eliminar</a>	
												
											</td>
										</tr>
									</tbody>
								<?php	
							}
						}
					?>	

			
		</table>
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


