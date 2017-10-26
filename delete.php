<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 10/10/2017
 * Time: 18:08
 */

include_once('config.php');
include_once('connectDb.php');

$id = $_REQUEST['id'];

$sql = "DELETE FROM clientes WHERE id = :id LIMIT 1";

$result = $pdo->prepare($sql);

$result->execute([
    'id' => $id
]);

header('Location: index.php');




der('Location: index.php');