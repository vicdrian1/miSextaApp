<?php
include '../db/connection.php';
if (isset($_POST['editar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $id = $_SESSION['idUsuario'];
    $_SESSION['nombreUsuario'] = $nombre;
    $_SESSION['apellidoUsuario'] = $apellido;
    $_SESSION['usuario'] = $usuario;

    $miUsuario = $connection->query('SELECT * FROM usuarios where usuario="' . $usuario . '"')->fetchAll();

    if (count($miUsuario) > 0) {
        $_SESSION['errorEditarUsuario'] = true;
        header('Location: editarForm.php');
    } else {
        $sql = 'UPDATE usuarios set nombre=?, apellido=?, usuario=? where id=?';

        try {
            $connection->prepare($sql)->execute([$nombre, $apellido, $usuario, $id]);
            header('Location: home.php');
        } catch (Exception $error) {
            $_SESSION['errorEditar'] = true;
            header('Location: editarForm.php');
        }
    }
}