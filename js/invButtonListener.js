$("button").on("click", function(event) {
  // Prevenir que el form se envíe al servidor
  event.preventDefault();
  // Obtener el nombre del producto y la acción desde el botón
  var producto = $(this).data("producto");
  var accion = $(this).data("accion");
  // Enviar una petición AJAX al archivo php con los datos
  $.ajax({
    url: "../php/buttonUpdate.php",
    method: "POST",
    data: {producto: producto, accion: accion},
    dataType: "text",
    success: function(data) {
      // Recibir la respuesta del servidor y actualizar el elemento p correspondiente
      $("#" + producto).text(data);
    }
  });
});