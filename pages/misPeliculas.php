<?php
include '../db/connection.php';
try {
    $peliculas = $connection->query('SELECT * FROM peliculas WHERE usuarioPelicula = "' . $_SESSION['idUsuario'] . '"')->fetchAll();
    echo json_encode($peliculas);
} catch (Exception $error) {
}