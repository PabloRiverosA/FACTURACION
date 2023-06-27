<?php
	include "../conexion.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">


	<link rel="stylesheet" type="text/css" href="css/styleNuevoDocumento.css">
	
	<?php include "include/scripts.php"; ?>
		
	
	<script>

	$(document).ready(function() {
	

	 $('#proveedor').on('change', function() {
	//alert( this.value );
	$("#prvOculto").val(this.value);
	
	//$Prove = $("#prvOculto").val(this.value);

});
});

</script>

<title>Sistema de facturación</title>
</head>
<body>
	<?php include "include/header.php"; ?>

	
	<section id="container">
		<div class= "form_register">
			<h1>Nuevo Documento</h1>
			<hr>
			<div class="alert"></div>
			<form action="insertFacturaDetalle.php" method="post">
				<div class="Cabezera">
				<label for="numDoc">N° Documento</label>
				<input type="number" name="numDoc" id="numDoc" placeholder="n° doc" required></div>
				<div class="Cabezera">
				<label for="TipoDoc">Tipo Documento:</label>
				<select name="TipoDoc" class="form-control" required>
					<option value="">[Seleccione]</option>
					<?php
						$query = mysqli_query($conection,"Select * from tipo_documento");
						$result = mysqli_num_rows($query);
						if ($result >0) {
							while ($data = mysqli_fetch_array($query)) 
								{
									?>
									<option value="<?php echo $data['tip_id']; ?>">
									<?php echo $data['tip_descripcion']; ?></option><?php
								}}
					?>
				</select></div>
				<div class="Cabezera">
				<label for="fecha">Fecha:</label>
				<input type="date" id="fecha" name="fecha" required></div>
				<div class="Cabezera">
				<div class="form-group">
				<label for="proveedor">Proveedor:</label>
				<select name="proveedor" id="proveedor" class="form-control" required>
					<option value="">[Seleccione]</option>
					<?php
						$query = mysqli_query($conection,"Select * from proveedor");
						$result = mysqli_num_rows($query);
						if ($result >0) {
							while ($data = mysqli_fetch_array($query)) 
								{
									?>
									<option value="<?php echo $data['prv_rut']; ?>">
									<?php echo $data['prv_nombre']; ?></option><?php
									
								}}
					?>
					</select>
			</div></div>
			<div class="Cabezera">
			<div class="form-group">
				<label for="producto">Producto:</label>
				
				<select name="producto" id="producto" class="form-control">
					<option value="">[Seleccione]</option>
					<?php
						
						$query = mysqli_query($conection,"Select * from producto");
						$result = mysqli_num_rows($query);
						if ($result >0) {
							while ($data = mysqli_fetch_array($query)) 
								{
									echo '<option value="' . $data['codproducto'] . '|' . $data['precio'] . '">' . $data['descripcion'] . '</option>';
								}
							}
					?>
					</select>
					
			</div></div>
			<div class="Cabezera">
			<label for="cantidad">Cantidad</label>
			<input type="number" name="cantidad" id="cantidad" placeholder="N° de productos" ></div>					
			
			<div class="Cabezera">
			<input type="button" value="Agregar" class="btn_save" onclick="agregarFila()"> 
			</div>				
			<hr>				
			<input type="text" id="valorProducto" name="valorProducto" value="0" style="display:none;">
        	<input type="text" id="valorTotal" name="valorTotal" value="0" style="display:none;">		
			<table id="grid">
				<thead>
					<tr>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Total</th>
						<th>Acciones</th>
					</tr>
				</thead>	
				<tbody id="tablaBody">
				
				</tbody>

				<tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold;">Total</td>
                        <td style="font-weight: bold;"><input style="border:none; background-color:var(--bs-table-bg);text-align:left;" readonly type="text" name="totalGeneral" id="totalGeneral" /></td>
						
						<td></td>
                    </tr>
                </tfoot>
			</table>
			<input type="submit" class="btn-grabar" value="Guardar" />
		</form>
		</div>

	</section>
	
    

	<?php include "include/footer.php"; ?>
</body>
</html>

