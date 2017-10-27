<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helper.php';
$query = $pdo->query("Select * from distroadadb.distro");
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Starter Template for Bootstrap</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DistroADA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="add.php">Añadir Distro</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <h1>Most Popular Distros</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Os Type</th>
            <th>Version</th>
            <th>Web</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><img src="<?= $row['image'] ?>" class="listimage img-responsive"<img></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['ostype'] ?></td>
                <td><?= $row['version'] ?></td>
                <td><?= $row['main_page'] ?></td>
                <td><span class="glyphicon glyphicon-pencil editar"></span></td>
                <td><span class="glyphicon glyphicon-trash borrar"></span></td>
            </tr>
        <? endwhile; ?>
        </tbody>
    </table>
</div><!-- /.container -->
</body>
</html>
