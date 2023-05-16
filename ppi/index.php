<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        .general{
            margin-top: 20%;
            text-align: center;
            display: block;
        }

        .botonlistado{
            margin-top: 2%;
            height: 20%;
            width: 40%;

        }

    </style>
</head>
<body>


<div class="general">


    <h1>

        Listado de empleados

    </h1>

    <a class="botonlistado" href="http://localhost/alanphp/bppi/ppi/b2">        
        <button> 
LISTADO DE EMPLEADOS
        </button>
    </a>

    <a class="botonlistado" href="http://localhost/alanphp/bppi/ppi/altaFoto">        
        <button> 
ALTA DE EMPLEADOS
        </button>
    </a>

    <a class="botonlistado" href="http://localhost/alanphp/bppi/ppi/login/bienvenido.php">        
        <button> 
INICIO  
        </button>
    </a>
</div>

</body>

<script>

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