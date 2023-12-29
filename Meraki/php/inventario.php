<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
        header('Location: ../index.html');            
    } else {
        $serverName = "stss.database.windows.net";
        $connectionOptions = array(
            "Database" => "STSSDB",
            "Uid" => "CloudSA4049f354",
            "PWD" => "Contraseña11"
        );

        //Establishes the connection
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starbucks STSS</title>
    <link href="https://www.starbucks.pe/Multimedia/logo/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ab4da2f3ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheets/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../index.html"><img src="../source/img/Logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="suministros.php">CONTROL DE SUMINISTROS</a></li>
            </ul>
        </nav>
    </header>
    <div class="stickyNav">
        <div class="filters">
            <a href="#" class="congelados" >CONGELADOS</a>
            <a href="#" class="refrigerados">REFRIGERADOS</a>
            <a href="#" class="secos">SECOS</a>
            <a href="#" class="limpieza">LIMPIEZA</a>
            <a href="#" class="publicidad">PUBLICIDAD</a>
        </div>
        <div class="buscador">
            
        </div>
    </div>
    
    <div class="inventoryContent">
       <section class="congeladosSection">
        <h2>CONGELADOS</h2>
        <div class="itemContainer">
            <?php
                $tsql= "EXEC FamiliaProductosPorSucursal "."'".$_SESSION['user']."', 'CONGELADO';";  
                $getResults= sqlsrv_query($conn, $tsql);
        
                if ($getResults == FALSE) echo (sqlsrv_errors());
        
                while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                    echo '<div class="item">';
                    echo '  <div class="itemTitle">';
                    echo "    <h3>{$row['NombreProducto']}</h3>";
                    echo '  </div>';
                    echo '  <div class="itemContent">';
                    echo '    <div class="img"></div>';
                    echo "    <button class=\"button1\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+1\">+1</button>";
                    echo "    <button class=\"button2\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-1\">-1</button>";
                    echo "    <button class=\"button3\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+10\">+10</button>";
                    echo "    <button class=\"button4\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-10\">-10</button>";
                    echo '    <div class="count">';
                    echo "      <p id=\"{$row['ProductoID']}\">{$row['Stock']}</p>";
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                   }
                sqlsrv_free_stmt($getResults);
            ?>
        </div>
       </section>
       <section class="refrigeradosSection">
        <h2>REFRIGERADOS</h2>
        <div class="itemContainer">
        <?php
                $tsql= "EXEC FamiliaProductosPorSucursal "."'".$_SESSION['user']."', 'REFRIGERADO';";  
                $getResults= sqlsrv_query($conn, $tsql);
        
                if ($getResults == FALSE) echo (sqlsrv_errors());
        
                while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                    echo '<div class="item">';
                    echo '  <div class="itemTitle">';
                    echo "    <h3>{$row['NombreProducto']}</h3>";
                    echo '  </div>';
                    echo '  <div class="itemContent">';
                    echo '    <div class="img"></div>';
                    echo "    <button class=\"button1\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+1\">+1</button>";
                    echo "    <button class=\"button2\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-1\">-1</button>";
                    echo "    <button class=\"button3\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+10\">+10</button>";
                    echo "    <button class=\"button4\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-10\">-10</button>";                    
                    echo '    <div class="count">';
                    echo "      <p id=\"{$row['ProductoID']}\">{$row['Stock']}</p>";
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                   }
                sqlsrv_free_stmt($getResults);
            ?>
        </div>
       </section>
       <section class="secosSection">
        <h2>SECOS</h2>
        <div class="itemContainer">
        <?php
                $tsql= "EXEC FamiliaProductosPorSucursal "."'".$_SESSION['user']."', 'SECOS';";  
                $getResults= sqlsrv_query($conn, $tsql);
        
                if ($getResults == FALSE) echo (sqlsrv_errors());
        
                while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                    echo '<div class="item">';
                    echo '  <div class="itemTitle">';
                    echo "    <h3>{$row['NombreProducto']}</h3>";
                    echo '  </div>';
                    echo '  <div class="itemContent">';
                    echo '    <div class="img"></div>';
                    echo "    <button class=\"button1\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+1\">+1</button>";
                    echo "    <button class=\"button2\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-1\">-1</button>";
                    echo "    <button class=\"button3\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+10\">+10</button>";
                    echo "    <button class=\"button4\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-10\">-10</button>";
                    echo '    <div class="count">';
                    echo "      <p id=\"{$row['ProductoID']}\">{$row['Stock']}</p>";
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                   }
                sqlsrv_free_stmt($getResults);
            ?>
        </div>
       </section>
       <section class="limpiezaSection">
        <h2>LIMPIEZA</h2>
        <div class="itemContainer">
        <?php
                $tsql= "EXEC FamiliaProductosPorSucursal "."'".$_SESSION['user']."', 'LIMPIEZA';";  
                $getResults= sqlsrv_query($conn, $tsql);
        
                if ($getResults == FALSE) echo (sqlsrv_errors());
        
                while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                    echo '<div class="item">';
                    echo '  <div class="itemTitle">';
                    echo "    <h3>{$row['NombreProducto']}</h3>";
                    echo '  </div>';
                    echo '  <div class="itemContent">';
                    echo '    <div class="img"></div>';
                    echo "    <button class=\"button1\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+1\">+1</button>";
                    echo "    <button class=\"button2\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-1\">-1</button>";
                    echo "    <button class=\"button3\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+10\">+10</button>";
                    echo "    <button class=\"button4\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-10\">-10</button>";
                    echo '    <div class="count">';
                    echo "      <p id=\"{$row['ProductoID']}\">{$row['Stock']}</p>";
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                   }
                sqlsrv_free_stmt($getResults);
            ?>
        </div>
       </section>
       <section class="publicidadSection">
        <h2>PUBLICIDAD</h2>
        <div class="itemContainer">
            <?php
                    $tsql= "EXEC FamiliaProductosPorSucursal "."'".$_SESSION['user']."', 'PUBLICIDAD';";  
                    $getResults= sqlsrv_query($conn, $tsql);
            
                    if ($getResults == FALSE) echo (sqlsrv_errors());
            
                    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                        echo '<div class="item">';
                        echo '  <div class="itemTitle">';
                        echo "    <h3>{$row['NombreProducto']}</h3>";
                        echo '  </div>';
                        echo '  <div class="itemContent">';
                        echo '    <div class="img"></div>';
                        echo "    <button class=\"button1\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+1\">+1</button>";
                        echo "    <button class=\"button2\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-1\">-1</button>";
                        echo "    <button class=\"button3\" data-producto=\"{$row['ProductoID']}\" data-accion=\"+10\">+10</button>";
                        echo "    <button class=\"button4\" data-producto=\"{$row['ProductoID']}\" data-accion=\"-10\">-10</button>";
                        echo '    <div class="count">';
                        echo "      <p id=\"{$row['ProductoID']}\">{$row['Stock']}</p>";
                        echo '    </div>';
                        echo '  </div>';
                        echo '</div>';
                    }
                    sqlsrv_free_stmt($getResults);
                ?>
        </div>
       </section>
    </div>
    <footer>
        <div class="footerImage">
            <img src="../source/img/Logo.png" alt="footerLogo">
        </div>
        <div class="footerContent">
            <div class="terms">
                <p class="title">POLITICAS Y TERMINOS</p>
                <ul>
                    <li><a href="#">POLITICAS DE PRIVACIDAD</a></li>
                    <li><a href="#">TERMINOS Y CONDICIONES</a></li>
                </ul>
            </div>
            <div class="aboutUs">
                <p class="title">SOBRE NOSOTROS</p>
                <ul>
                    <li><a href="../pages/quienesSomos.html">QUIENES SOMOS</a></li>
                    <li><a href="../pages/misionVision.html">NUESTRA MISION Y VISION</a></li>
                </ul>
            </div>
            <div class="contact">
                <p class="title">CONTACTO Y SOPORTE</p>
                <ul>
                    <li><a href="https://wa.me/51997701723"  target="_blank">CONTACTO AL WHATSAPP</a></li>
                    <li><a href="#">CORREO: CONTACT@STSS.COM</a></li>
                </ul>
            </div>
        </div>
        <div class="social">
            <p>SIGUENOS</p>
            <div class="buttons">
                <a href="https://www.facebook.com/starbucksperu" target="_blank"><i class="fa-brands fa-square-facebook fa-xl" style="color: #1e3932;"></i></a>
                <a href="https://www.instagram.com/starbuckspe" target="_blank"><i class="fa-brands fa-instagram fa-xl" style="color: #1e3932;"></i></a>
            </div>
            <p class="copy">©2023 Lasino. Todos los Derechos Reservados.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/inventario.js"></script>
    <script src="../js/invButtonListener.js"></script>
</body>
</html>