<?php
include_once 'config.php';
include_once 'connectDb.php';
$cliente = null;
$sql = null;

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * from clientes where email = '{$email}' and password = '{$password}'";
    $queryResult = $pdo->query($sql);
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake login</title>
</head>
<body>
<h2>SQL</h2>

<div class="container">
    <form action="" method="post">

        <div class="form-group">

            <div class="form-control">
                <label for="correo">Email</label>
                <input type="text" id="correo" name="email" required>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <input type="submit" class="btn btn-primary" value="Guardar"/>
    </form>
</div>
<p><?= $sql ?></p>
<table class="table">
    <tr>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['email'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><?= $row['id'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
