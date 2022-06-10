
<?php
include '../db/connection.php';
session_destroy();
header('Location: ../index.php');