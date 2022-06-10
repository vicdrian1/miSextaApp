<?php
if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $miUsuario = $connection->query('SELECT * FROM usuarios where usuario="'.$usuario.'"')->fetchAll();

    if(count($miUsuario) > 0){
        $_SESSION['errorUsuario'] = true;
        header('Location: pages/registrarseForm.php');
    }else{
        $sql = 'INSERT INTO usuarios (nombre, apellido, usuario, pass) values (?,?,?,?)';

        try{
            $connection->prepare($sql)->execute([$nombre, $apellido, $usuario, md5($pass)]);
        }catch(Exception $error){
            echo $error;
        }
    }
}