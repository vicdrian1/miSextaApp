
<?php
session_start();
$host = 'oliadkuxrl9xdugh.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$dbname = 'veod2bb44wdxa5x0';
$username = 'q3yx3slix37u9sm4';
$password = 'dm7imjjn2z0jm4ne';

$options = [
    \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE  => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES  => false
];
