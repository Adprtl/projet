<?php
$dsn = 'mysql:host=localhost;dbname=testf;charset=utf8';
$user = 'root';
try
{
    $pdo = new PDO($dsn, $user);
    $pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}



?>