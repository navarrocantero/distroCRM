<?php
try {

    $pdo = new PDO("mysql:host=$server;dbname=$database", $user, $pass);

} catch (PDOException $e) {
    include 'error.php';
    exit();
}