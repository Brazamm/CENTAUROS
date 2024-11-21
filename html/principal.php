<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Pagina principal</title>
</head>
<body>
    <div class="contenedor active" id="contenedor">
        <header class="header">
            <div class="contenedor-logo">
            <a href="principal.php">
        <i class="fa-solid fa-lock-open"></i>
        <i class="fa-solid fa-lock"></i> </a>
        <H5>CENTAUROS</H5>
            </div>
            
            <div class="botones-header">
                <button><i class="fas fa-user"></i></button>
                <a href="#" class="avatar"><img src="img/avatar.jpg" alt=""></a>
            </div>
        </header>

        <nav class="menu-lateral">
            <a href="principal.php" class="active"><i class="fas fa-home"></i> </a>
            <a href="#"><i class="fa-solid fa-money-check-dollar"></i> </a>
            <a href="historial.php"><i class="fa-solid fa-clock-rotate-left"></i></a>
        </nav>
        
<div class="containerpri" id="containerpri">
    
        </div>
    </div>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

    <?php
    if(isset($_SESSION['documento'])){
        $documento = $_SESSION['documento'];
        $query = mysqli_query($conn, "SELECT login.* FROM login WHERE login.documento='$documento'");
        if($row = mysqli_fetch_array($query)){
            echo $row['nombre'] . ' ' . $row['apellido'];
        } else {
            echo "No se encontraron datos.";
        }
    }
    mysqli_close($conn);  // Cerrar la conexión
    ?>
</body>
</html>
