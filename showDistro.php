<?php
include_once 'config.php';
include_once 'connectDb.php';
$thisDistroName;
$id = $_REQUEST['id'];
$sql = "SELECT * FROM distro WHERE id = :id LIMIT 1";
$result = $pdo->prepare($sql);
$result->execute(['id' => $id]);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DistroAda</title>

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
            <a class="navbar-brand" href="index.php">DistroADA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="add.php">Añadir Distro</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
</div>
<table class="table table-striped">
    <thead>

    <div class="mainTab">
        <table class="table table-striped">
            </thead>
            <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td>
                    <div class="leftBox">
                        <img src="<?php echo $row['image']; ?> " alt="Image Decription">
                    </div>
                </td>
            </tr>
            <tr>
            <tr>
                <td>Description</td>
                <td><?= $row['description'] ?></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?= $row['category'] ?></td>
            </tr>
            <tr>
                <td>Origin</td>
                <td><?= $row['origin'] ?></td>
            </tr>
            <tr>
                <td>Architecture</td>
                <td><?= $row['arch'] ?></td>
            </tr>
            <tr>
                <td>Desktop</td>
                <td><?= $row['desktop'] ?></td>
            </tr>

            <tr>
                <td>Status</td>
                <td><?= $row['status'] ?></td>
            </tr>
            <tr>
                <td>Web</td>
                <td><?= $row['main_page'] ?></td>
            </tr>
            <tr>
                <td>Doc</td>
                <td><?= $row['doc'] ?></td>
            </tr>
            <tr>
                <td>Forums</td>
                <td><?= $row['forums'] ?></td>
            </tr>
            <tr>
                <td>Error tracker</td>
                <td><?= $row['error_tracker'] ?></td>
            </tr>
        </table>
    </div>
    </tbody>
</table>
<?php endwhile; ?>

</div>
</body>
</html>