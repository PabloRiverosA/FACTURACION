$(document).ready(function() {
    $(".btn_save").on("click", function(e) {
        e.preventDefault();
               
        var producto =$("#producto option:selected").text();

        var productoValue = document.getElementById('producto').value.split("|")[0];
        var precio = document.getElementById('producto').value.split("|")[1];
        
              
        var cantidad = $("#cantidad").val();
       // var precio = $("#producto").val();
        
        //var precio = $("#precio").val();
        var total = cantidad * precio;

        $("#valorProducto").val(total);
        $("#valorTotal").val(parseInt($("#valorProducto").val())+parseInt($("#valorTotal").val()));
        $("#totalGeneral").val(Number($("#valorTotal").val()).toLocaleString('es-CL', { style: 'currency', currency: 'CLP' }));



        var fila = "<tr>";
               
        fila += '<td><input readonly style="border:none; background-color:var(--bs-table-bg);text-align:left;" type="text" name="producto[]" id="producto[]" value="'+producto+'" /><input style="display:none;border:none; background-color:var(--bs-table-bg);text-align:left;" type="text" name="productoValue[]" id="productoValue[]" value="'+productoValue+'" /></td>';
        fila += '<td><input readonly style="border:none; background-color:var(--bs-table-bg);text-align:left;" type="text" name="cantidad[]" id="cantidad[]" value="'+cantidad+'" /></td>';
        fila += '<td><input readonly style="border:none; background-color:var(--bs-table-bg);text-align:left;" type="text" name="precio[]" id="precio[]" value="'+precio+'" /></td>';
        fila += '<td><input readonly style="border:none; background-color:var(--bs-table-bg);text-align:left;" type="text" name="total[]" id="total[]" value="'+total+'" /></td>';
        // Resto de las columnas de la fila
        fila += "<td><a class='Link_eliminar' href='#'>Eliminar</a></td>";
        fila += "</tr>";
        
        $("#grid tbody").append(fila);
        
        $("#producto").val("");
        $("#cantidad").val("");
        $("#cantidad").val("");
        $("#precio").val("");
        
        
    });

  // Capturar el evento de clic en el enlace "Eliminar"
  $(document).on("click", ".Link_eliminar", function(e) {
    e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

    // Obtener la fila padre del enlace "Eliminar"
    var row = $(this).closest("tr");

    // Eliminar la fila de la tabla
    row.remove();
   
//alert ("Eliminar Registro?")

    });



$(document).on("click", ".Link_editar", function(e) {
    e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace "Editar"

    // Obtener la fila padre del enlace "Editar"
    var row = $(this).closest("tr");

    // Habilitar la edición directa de las celdas de la fila
    row.find("td").each(function() {
        var cell = $(this);
        var currentValue = cell.text();

        // Crear un elemento de entrada para editar el valor actual
        var input = $("<input>").attr("type", "text").val(currentValue);

        // Reemplazar el contenido de la celda con el elemento de entrada
        cell.html(input);
    });

    // Cambiar el texto del enlace "Editar" a "Guardar"
    $(this).html("Guardar").removeClass("Link_editar").addClass("Link_guardar");
});

$(document).on("click", ".Link_guardar", function(e) {
    e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace "Guardar"

    // Obtener la fila padre del enlace "Guardar"
    var row = $(this).closest("tr");

    // Deshabilitar la edición directa de las celdas de la fila
    row.find("td").each(function() {
        var cell = $(this);
        var inputValue = cell.find("input").val();

        // Restaurar el contenido de la celda con el nuevo valor
        cell.html(inputValue);
    });

    // Cambiar el texto del enlace "Guardar" a "Editar"
    $(this).html("Editar").removeClass("Link_guardar").addClass("Link_editar");
});


})