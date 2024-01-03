<?php
    session_start();
    // Recibir los datos del producto y la acción
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

    switch ($accion) {
    case "PAPELERIA":
        $sql = "SELECT s.ProductoID AS ID, p.NombreProducto AS Nombre, s.CantidadPasada AS UltimoPedido, s.FechaSuministro AS Fecha, s.Stock AS Stock, s.UnidadMedida AS UnidadMedida
                FROM Suministros s
                INNER JOIN Productos p ON s.ProductoID = p.ProductoID
                INNER JOIN ProductosEnSucursal ps ON s.ProductoID = ps.ProductoID AND s.SucursalID = ps.SucursalID
                INNER JOIN Sucursal su ON s.SucursalID = su.SucursalID
                WHERE su.Nombre = '{$_SESSION['user']}' AND p.FamiliaProducto = 'PAPELERIA';
                ";
        break;
    case "SECOS":
        $sql = "SELECT s.ProductoID AS ID, p.NombreProducto AS Nombre, s.CantidadPasada AS UltimoPedido, s.FechaSuministro AS Fecha, s.Stock AS Stock, s.UnidadMedida AS UnidadMedida
                FROM Suministros s
                INNER JOIN Productos p ON s.ProductoID = p.ProductoID
                INNER JOIN ProductosEnSucursal ps ON s.ProductoID = ps.ProductoID AND s.SucursalID = ps.SucursalID
                INNER JOIN Sucursal su ON s.SucursalID = su.SucursalID
                WHERE su.Nombre = '{$_SESSION['user']}' AND p.FamiliaProducto = 'SECOS';
                ";
        break;
    case "EPP":
        $sql = "SELECT s.ProductoID AS ID, p.NombreProducto AS Nombre, s.CantidadPasada AS UltimoPedido, s.FechaSuministro AS Fecha, s.Stock AS Stock, s.UnidadMedida AS UnidadMedida
                FROM Suministros s
                INNER JOIN Productos p ON s.ProductoID = p.ProductoID
                INNER JOIN ProductosEnSucursal ps ON s.ProductoID = ps.ProductoID AND s.SucursalID = ps.SucursalID
                INNER JOIN Sucursal su ON s.SucursalID = su.SucursalID
                WHERE su.Nombre = '{$_SESSION['user']}' AND p.FamiliaProducto = 'EPP';
                ";
        break;
    case "LIMPIEZA":
        $sql = "SELECT s.ProductoID AS ID, p.NombreProducto AS Nombre, s.CantidadPasada AS UltimoPedido, s.FechaSuministro AS Fecha, s.Stock AS Stock, s.UnidadMedida AS UnidadMedida
                FROM Suministros s
                INNER JOIN Productos p ON s.ProductoID = p.ProductoID
                INNER JOIN ProductosEnSucursal ps ON s.ProductoID = ps.ProductoID AND s.SucursalID = ps.SucursalID
                INNER JOIN Sucursal su ON s.SucursalID = su.SucursalID
                WHERE su.Nombre = '{$_SESSION['user']}' AND p.FamiliaProducto = 'LIMPIEZA';
                ";
        break;
    case "SMALLWARE":
        $sql = "SELECT s.ProductoID AS ID, p.NombreProducto AS Nombre, s.CantidadPasada AS UltimoPedido, s.FechaSuministro AS Fecha, s.Stock AS Stock, s.UnidadMedida AS UnidadMedida
                FROM Suministros s
                INNER JOIN Productos p ON s.ProductoID = p.ProductoID
                INNER JOIN ProductosEnSucursal ps ON s.ProductoID = ps.ProductoID AND s.SucursalID = ps.SucursalID
                INNER JOIN Sucursal su ON s.SucursalID = su.SucursalID
                WHERE su.Nombre = '{$_SESSION['user']}' AND p.FamiliaProducto = 'SMALLWARE';
                ";
        break;
    case "PRENDAS":
        $sql = "SELECT s.ProductoID AS ID, p.NombreProducto AS Nombre, s.CantidadPasada AS UltimoPedido, s.FechaSuministro AS Fecha, s.Stock AS Stock, s.UnidadMedida AS UnidadMedida
                FROM Suministros s
                INNER JOIN Productos p ON s.ProductoID = p.ProductoID
                INNER JOIN ProductosEnSucursal ps ON s.ProductoID = ps.ProductoID AND s.SucursalID = ps.SucursalID
                INNER JOIN Sucursal su ON s.SucursalID = su.SucursalID
                WHERE su.Nombre = '{$_SESSION['user']}' AND p.FamiliaProducto = 'PRENDAS DE VESTIR';
                ";
        break;
    }     
     
    $result = sqlsrv_query($conn, $sql);
    if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        echo "    <td>{$row['ID']}</td>";
        echo "    <td>{$row['Nombre']}</td>";
        echo "    <td>{$row['UltimoPedido']}</td>";
        $fecha = $row['Fecha'];
        $fecha_str = $fecha->format('Y-m-d H:i');
        echo "    <td>{$fecha_str}</td>";
        echo "    <td>{$row['Stock']}</td>";
        echo "    <td>{$row['UnidadMedida']}</td>";
        echo "</tr>";
    }
?>
