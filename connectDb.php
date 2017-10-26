<?php
try {

    $pdo = new PDO("mysql:host=$server;dbname=$database", $user, $password);

} catch (PDOException $e) {
    include 'error.php';
    exit();
}