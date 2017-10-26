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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/theme.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
          crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Distro CRM</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Distro CRM</h1>
        <h2>...by Ada ITS</h2>
    </div>


    <div class="mainTab">
        <table class="table">
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <th>
                    <div class="leftBox">
                        <img src="<?php echo $row['image_logo']; ?> " alt="Image Decription">
                        <!--        <img src="--><?php //echo $row['image_desktop']; ?><!-- ">-->
                    </div>
                </th>
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
                <td><?= $row['architecture'] ?></td>
            </tr>

            <tr>
                <td>Desktop</td>
                <td><?= $row['desktop'] ?></td>
            </tr>

            <tr>
                <td>Last Update</td>
                <td><?= $row['last_update'] ?></td>
            </tr>

            <tr>
                <td>Status</td>
                <td><?= $row['Status'] ?></td>
            </tr>
            <tr>
                <td>Website</td>

                <td><a href="<?= $row['home_page']; ?>"
                    <input type="submit" value="Link" class="btn ">Link
                </td>
            </tr>

            <tr>
                <td>Image</td>
                <td><img src="<?php echo $row['image_desktop']; ?> " alt="Image Decription"
                         onclick="<?php  echo $row['image_desktop']; ?>">
                </td>
            </tr>


        </table>
    </div>

    <?php endwhile; ?>


    <div class="footer">
        <ul>
            <li><a href="indegx.php" class="btn btn - primary"> Back</a></li>
    </div>

</div>
</body>
</html>