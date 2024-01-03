<?php
    session_start();
    // Recibir los datos del producto y la acción
    $producto = $_POST['producto'];
    $accion = $_POST['accion'];
    $serverName = "stss.database.windows.net";
    $connectionOptions = array(
        "Database" => "STSSDB",
        "Uid" => "CloudSA4049f354",
        "PWD" => "Contraseña11"
    );
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Conectar a la base de datos y ejecutar una consulta SQL para actualizar el stock
    switch ($accion) {
    case "+1":
        // Aumentar el stock en uno
        $sql = "UPDATE Inventario SET Stock = Stock + 1
                FROM Inventario i
                JOIN ProductosEnSucursal ps ON i.ProductoID = ps.ProductoID AND i.SucursalID = ps.SucursalID
                JOIN Sucursal s ON ps.SucursalID = s.SucursalID
                WHERE i.ProductoID = '$producto' AND s.Nombre = '{$_SESSION['user']}'
                ";
        break;
    case "-1":
        // Disminuir el stock en uno
        $sql = "UPDATE Inventario SET Stock = Stock - 1
                FROM Inventario i
                JOIN ProductosEnSucursal ps ON i.ProductoID = ps.ProductoID AND i.SucursalID = ps.SucursalID
                JOIN Sucursal s ON ps.SucursalID = s.SucursalID
                WHERE i.ProductoID = '$producto' AND s.Nombre = '{$_SESSION['user']}'
                ";
        break;
    case "+10":
        // Aumentar el stock en diez
        $sql = "UPDATE Inventario SET Stock = Stock + 10
                FROM Inventario i
                JOIN ProductosEnSucursal ps ON i.ProductoID = ps.ProductoID AND i.SucursalID = ps.SucursalID
                JOIN Sucursal s ON ps.SucursalID = s.SucursalID
                WHERE i.ProductoID = '$producto' AND s.Nombre = '{$_SESSION['user']}'
                ";
        break;
    case "-10":
        // Disminuir el stock en diez
        $sql = "UPDATE Inventario SET Stock = Stock - 10
                FROM Inventario i
                JOIN ProductosEnSucursal ps ON i.ProductoID = ps.ProductoID AND i.SucursalID = ps.SucursalID
                JOIN Sucursal s ON ps.SucursalID = s.SucursalID
                WHERE i.ProductoID = '$producto' AND s.Nombre = '{$_SESSION['user']}'
                ";
        break;
    }

    // Ejecutar la consulta y verificar si se realizó correctamente
    $result = sqlsrv_query($conn, $sql);
    if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
    }
    // Obtener el nuevo valor del stock desde la base de datos
    $sql = "SELECT Stock
            FROM Inventario i
            JOIN ProductosEnSucursal ps ON i.ProductoID = ps.ProductoID AND i.SucursalID = ps.SucursalID
            JOIN Sucursal s ON ps.SucursalID = s.SucursalID
            WHERE i.ProductoID = '$producto' AND s.Nombre = '{$_SESSION['user']}'
            ";
    $result = sqlsrv_query($conn, $sql);
    if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $stock = $row['Stock'];

    // Enviar el nuevo valor del stock como respuesta al navegador
    echo $stock;
?>
