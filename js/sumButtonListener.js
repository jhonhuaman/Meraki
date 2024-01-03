$(".navOption").on("click", function(event) {
    event.preventDefault();
    
    var accion = $(this).data("accion");
    
    // Enviar una petición AJAX al archivo php con los datos
    $.ajax({
      url: "../php/tableUpdate.php",
      method: "POST",
      data: {accion: accion},
      dataType: "text",
      success: function(data) {
        // Recibir la respuesta del servidor y actualizar la tabla
        $("table tbody").empty();
        $("table tbody").append(data);
      }
    });
  });