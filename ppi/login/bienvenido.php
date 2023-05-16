<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENIDO</title>

    <style>

        .opcion{

            background-color: black;
            color: white;
            height: 30px;
            width: 50px;

        }

        .opcionesContenedor{
            text-align: center;
            width: 100%;
            background-color: black;
        }
        a{
            margin-left: 10%;
            margin-right: 10%;
        }
        .welcome{
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="opcionesContenedor">

        <a href="../" class="opcion">EMPLEADOS</a>
        <a href="../backProductos/" class="opcion">PRODUCTO</a>
        <a href="" class="opcion">PEDIDOS</a>
        <a href="" class="opcion"></a>

    </div>

    <div class="welcome">
        
        <h1>
            <div class="cerrarSesion"><p>BIENVENIDO <?php echo $_SESSION['username']; ?></p></div> 
        </h1> 
        <div class="cerrarSesion">
            <button onclick="cerrarSesion()">Cerrar sesión</button>
        </div>
    
    </div>

</body>

<script>
    function cerrarSesion(){
    window.location.href = 'cerrarsesion.php';
    }

    $(document).ready(function() {
    verificarSesion();
    });

    function verificarSesion() {
    $.get('verificar_sesion.php', function(data) {
        if (data == 'true') {
            // El usuario tiene una sesión abierta
 
        } else {
            // El usuario no tiene una sesión abierta
            window.location.href = 'login.php';
        }
    });
}
</script>
</html>
