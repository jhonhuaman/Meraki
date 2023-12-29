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

        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STSS | Suministros</title>
    <link href="https://www.starbucks.pe/Multimedia/logo/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ab4da2f3ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="../stylesheets/style.css">
</head>
<body>
    <div class="modal hidden">
        <button class="close">&times;</button>
        <div class="modal-content">
            <h3>Seleccionaste el producto:</h3>
            <p>ID: <span id="id"></span></p>
            <p>Nombre: <span id="nombre"></span></p>
            <p>Último pedido: <span id="pedido"></span></p>
            <p>Fecha: <span id="fecha"></span></p>
            <p>Stock: <span id="stock"></span></p>
            <form class="modalForm">
            <label for="cantidad">¿Cuánta cantidad deseas?</label>
            <input type="number" id="cantidad" min="1" value="1">
            <button type="submit" class="modalButton">Confirmar</button>
            </form>
        </div>
    </div>

    <div class="overlay hidden"></div>

    <header>
        <div class="logo">
            <a href="../index.html"><img src="../source/img/Logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="../php/inventario.php">CONTROL DE INVENTARIO</a></li>
            </ul>
        </nav>
    </header>
    <div class="supplyContent">
        <div class="sidebar">
            <ul class="sidebarNav">
                <li><button class="navOption" data-accion="PAPELERIA">PAPELERIA</button></li>
                <li><button class="navOption" data-accion="SECOS">SECOS</button></li>
                <li><button class="navOption" data-accion="EPP">EPP</button></li>
                <li><button class="navOption" data-accion="LIMPIEZA">LIMPIEZA</button></li>
                <li><button class="navOption" data-accion="SMALLWARE">SMALLWARE</button></li>
                <li><button class="navOption" data-accion="PRENDAS">PRENDAS VESTIR</button></li>
            </ul>
        </div>
        <div class="suministrosItems">
            <div class="searchBar">
                <input type="text" placeholder="Buscar" required>
                <div class="btnSearch">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                </div>
            </div> 

            <div class="suministrosTable">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ultimo Pedido</th>
                            <th>Fecha</th>
                            <th>Stock</th>
                            <th>Unidad Medida</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>    

        </div>
        <div class="panelSuministros">
            <button class="agregar">
                Agregar Item
            </button>
            <button class="eliminar">
                Eliminar Item
            </button>
            <button class="lista">
                Lista de Items
            </button>
            <button class="pedir">
                Solicitar Pedido
            </button>
        </div>
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
                    <li><a href="quienesSomos.html">QUIENES SOMOS</a></li>
                    <li><a href="../pages/misionVision.html">NUESTRA MISION Y VISION</a></li>
                </ul>
            </div>
            <div class="contact">
                <p class="title">CONTACTO Y SOPORTE</p>
                <ul>
                    <li><a href="https://wa.me/51997701723" target="_blank">CONTACTO AL WHATSAPP</a></li>
                    <li><a href="">CORREO: CONTACT@STSS.COM</a></li>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/suministro.js"></script>
    <script src="../js/sumButtonListener.js"></script>
</body>
</html>