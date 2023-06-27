<?php 
	date_default_timezone_set('America/Santiago'); 
	
	function fechaC(){
		$mes = array("","Enero", 
					  "Febrero", 
					  "Marzo", 
					  "Abril", 
					  "Mayo", 
					  "Junio", 
					  "Julio", 
					  "Agosto", 
					  "Septiembre", 
					  "Octubre", 
					  "Noviembre", 
					  "Diciembre");
		return date('d')." de ". $mes[date('n')] . " de " . date('Y');
	}


	// Función para obtener las facturas desde la base de datos
	function obtenerFacturas() {
		// Aquí iría tu código para obtener las facturas desde la base de datos
		// ...
		return true;
	}
	
	// Función para editar una factura en la base de datos
	function editarFactura($id, $nuevosDatos) {
		// Aquí iría tu código para editar la factura con el ID proporcionado
		// ...
		return true;
	}
	
	// Función para eliminar una factura de la base de datos
	function eliminarFactura($id) {
		// Aquí iría tu código para eliminar la factura con el ID proporcionado
		// ...
		return true;
	}