<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(lightblue, lightpink);
            height: 100vh;
        }

        body,
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-family: Arial, Helvetica, sans-serif;
        }

        input,
        button {
            margin: .5rem;
        }

        input {
            background-color: transparent;
            border: 0;
            border-bottom: 1px solid white;
        }

        input:focus {
            outline: none;
        }

        input::placeholder {
            color: white;
            letter-spacing: .2rem;
        }
    </style>
</head>

<body>
    <h1>CEISBOOK - REGISTRO</h1>
    <form action="../index.php" method="post">
        <input required type="text" placeholder="nombre" name="nombre">
        <input required type="text" placeholder="apellido" name="apellido">
        <input required type="text" placeholder="usuario" name="usuario">
        <input required type="password" placeholder="contraseña" name="pass">
        <button name="registrar">REGISTRAR</button>
    </form>
    <?php
    include '../db/connection.php';
    if ($_SESSION['errorUsuario']) {
        echo '<p>El usuario ya existe. Inicie sesión.</p>';
        session_destroy();
    }
    ?>
    <a href="../index.php">Volver al HOME</a>
</body>

</html>