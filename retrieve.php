<!DOCTYPE html>
<html>
    <head>  
        <?php
        include("head.php");
        ?>
        <script src="js/codeRead.js"></script>
        <script src="js/timer.js"></script>
    </head>
    <body>
        <div class="header">
            <img id="logo-img" src="img/placeholder-logo2.png">
        </div>
        <?php
            include("inc/settings.php");
            $clave = $_GET["clave"];
            if(mysqli_connect_errno()) {
                include("connectError.php");
            } else {
                try {
                    $query = "SELECT nombre, existencias, precio, rutaimg FROM productos WHERE clave = ?";
                    $stmt = $mysqlConn->prepare($query);
                    $stmt->bind_param("i", $clave);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_array();
                    if (!empty($result)) {
                        echo "
                        <h1 class='nom-prod'>".$result['nombre']."</h1>
                        <div class='center product-container'>
                            <div class='product-child'>
                                <img class='product-img' src='".$result['rutaimg']."'>
                            </div>
                            <div class='product-child'>
                                <p class='product-info'> <b>Precio: $".$result["precio"]." MX </b><br>
                                <br> Existencias: <b>".$result["existencias"]."</b> restantes</p>
                            </div>
                        </div>
                        <script>customTimer(8000);</script>";
                    } else {
                        include("notFoundError.php");
                    }
                } catch (Exception $e) {
                    include "catchError.php";
                    echo "hola";
                }
            }
        ?>
        <div class="clearfix">
        </div>
        <div class='footer'>
            <img class="bottom-img" src="img/cropped-scangif-2.gif">
            <h4 class="bottom-ins">Puede pasar otro producto en cualquier momento</h4> 
        </div>
    </body>
</html>