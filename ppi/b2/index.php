<!DOCTYPE html>
<html>
<head>
	
    <title>Eliminar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function actualizarTabla() {
            $.ajax({
                url: 'getempleados.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    console.log(data);

                    var html = '<table>';
                    html += '<tr><th>ID</th><th>NAME</th><th>LAST NAME</th><th>MAIL</th><th>Rol</th><th>ELIMINAR</th><th>VER DETALLE</th><th>EDITAR</th></tr>';
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr id="row-' + data[i].id + '">';
                        html += '<td>' + data[i].id + '</td>';
                        html += '<td>' + data[i].nombre + '</td>';
                        html += '<td>' + data[i].apellidos + '</td>';
                        html += '<td>' + data[i].correo + '</td>';
                        html += '<td>' + data[i].rol + '</td>';
                        html += '<td><button onclick="ajaxdelete(' + data[i].id + ')">Eliminar</button></td>';
                        html += '<td><button onclick="verDetalleLE(' + data[i].id + ')">Ver Detalle</button></td>';
                        html += '<td><button onclick="editarLE(' + data[i].id + ')">Editar</button></td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    $('#tabla').html(html);
                }
            });
        }

            function verificarSesion() {
            $.get('../login/verificar_sesion.php', function(data) {
            if (data == 'true') {
                // El usuario tiene una sesión abierta
            actualizarTabla();
 
            } else {
            // El usuario no tiene una sesión abierta
            window.location.href = '../login/login.php';
        }
    });
}

        $(document).ready(function() {
            verificarSesion();
            // Llama a actualizarTabla al cargar la página

        });

        function ajaxdelete(x) {
            let permiso = confirm("¿Estás seguro de que quieres eliminar este registro?");
            if (permiso) {
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { id: x },
                    success: function(response) {
                        
                        deleteRow(x);

                    }
                });
            }
        }

        function deleteRow(rowId) {
        $('#row-' + rowId).remove();
        }

        function verDetalleLE(x){
            console.log(x);
            window.location.href = "http://localhost/alanphp/bppi/ppi/verDetalle?id=" + x;
        }

        function editarLE(x){
            console.log(x);
            window.location.href = "http://localhost/alanphp/bppi/ppi/editar?id=" + x;
        }

    </script>

</head>

<body>
    <div id="tabla"></div>
</body>

<a class="botonlistado" href="http://localhost/alanphp/bppi/ppi"><button>REGRESAR</button></a>

</html>
