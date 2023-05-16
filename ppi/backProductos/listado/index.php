<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listado de productos</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <script>

        function editarproductoid(x){
            console.log(x);
            window.location.href = "http://localhost/alanphp/bppi/ppi/backproductos/edicion/?id=" + x;
        }

        function verdetalleproductoid(x){
            console.log(x);
            window.location.href = "http://localhost/alanphp/bppi/ppi/backproductos/verdetalle/?id=" + x;
        }

        function borrarproductoid(x) {
            let permiso = confirm("¿Estás seguro de que quieres eliminar este registro?");
            if (permiso) {
                $.ajax({
                    url: '../eliminacion/eliminarproducto.php',
                    type: 'POST',
                    data: { id: x },
                    success: function(response) {
                        
                        alert(response);

                        deleteRow(x);

                    }
                });
            }
        }

        function deleteRow(rowId) {
        $('#row-' + rowId).remove();
        }

        function obtener(){

            $.ajax({
                url: "obtenerproductos.php",
                type: "GET",
                dataType: 'json',
                success:function(data){

                    var html = '<table>';
                    html += '<tr><th>ID</th><th>NOMBRE</th><th>CODIGO</th><th>DESCRIPCION</th><th>COSTO</th><th>STOCK</th><th>STATUS</th><th>ELIMINADO</th><th>ELIMINAR</th><th>VER DETALLE</th><th>EDITAR</th></tr>';
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr id="row-' + data[i].id + '">';
                        html += '<td>' + data[i].id + '</td>';
                        html += '<td>' + data[i].nombre + '</td>';
                        html += '<td>' + data[i].codigo + '</td>';
                        html += '<td>' + data[i].descripcion + '</td>';
                        html += '<td>' + data[i].costo + '</td>';
                        html += '<td>' + data[i].stock + '</td>';
                        html += '<td>' + data[i].status + '</td>';
                        html += '<td>' + data[i].eliminado + '</td>';
                        html += '<td><button onclick="borrarproductoid(' + data[i].id + ')">Eliminar</button></td>';
                        html += '<td><button onclick="verdetalleproductoid(' + data[i].id + ')">Ver Detalle</button></td>';
                        html += '<td><button onclick="editarproductoid(' + data[i].id + ')">Editar</button></td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    $('#tabla').html(html);

                }
            });
        }


        $(document).ready(function(){
            obtener();
        });
    </script>

<div id="tabla"></div>

</body>
</html>