<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        #contenedor2 {
            border: 1px solid red;
            width: 10rem;
            height: 10rem;
            margin-top: 15rem;
        }
    </style>

</head>

<body>
    <?php
    include '../db/connection.php';
    if ($_SESSION['nombreUsuario']) {
        include 'editar.php';
        echo '<h1>Bienvenido, ' . $_SESSION['nombreUsuario'] . '</h1>';
        echo '<button><a href="cerrar_sesion.php">Cerrar Sesión</a></button>';
        echo '<button><a href="editarForm.php">Editar Perfil</a></button>';
        echo '<button id="verPeliculas">Ver Peliculas</button>';
        echo '<button id="ocultarPeliculas">Ocultar Peliculas</button>';
        echo '<div id="contenedor"></div>';
        echo '<div id="contenedor2"></div>';
        // include 'misPeliculas.php';
    } else {
        header('Location: ../index.php');
    }
    ?>
    <script>
        // var boton = document.getElementById('verPeliculas')

        $('#verPeliculas').click(obtenerPeliculas)
        $('#ocultarPeliculas').click(function() {
            $('#contenedor').html('')
        })

        function obtenerPeliculas() {
            $.ajax({
                method: 'GET',
                dataType: 'json',
                url: 'misPeliculas.php',
                data: {},
                success: function(data) {
                    console.log(data);
                    $('#contenedor').html('')
                    $('#contenedor2').html('')
                    data.forEach(element => {
                        $('#contenedor').append(
                            '<p>' +
                            element.id +
                            ' -> ' +
                            element.nombre +
                            '</p>'
                        )
                        $('#contenedor2').append(
                            '<p>' +
                            element.id +
                            ' -> ' +
                            element.cine +
                            '</p>'
                        )
                    })
                },
                error: function(response) {
                    console.log(response);
                }
            })
        }


        // boton.addEventListener('click', function(){

        // })
    </script>
</body>

</html>