<?php
include_once 'config.php';
include_once 'connectDb.php';
$thisDistroName;
$queryResult = $pdo->query("SELECT * from distro");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/theme.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
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
            <tr>
                <th>Name</th>
                <th>Last Update</th>
                <th>Status</th>
                <th>Info</th>
                <th>Website</th>
                <!--        <th>Drop</th>-->
                <th>Drop</th>
                <th>Update</th>

            </tr>

            <?php while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?php echo $row['last_update']; ?></td>
                    <td><?= $row['Status']; ?></td>
                    <td>
                        <form action="showSingleDistro.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="submit" value="Go" class="btn">
                        </form>
                    </td>
                    <td><a href="<?= $row['home_page']; ?>"
                        <input type="submit" value="Link" class="btn ">Link
                    </td>

                </>

                <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="submit" value="Drop" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="editSingleDistro.php" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="submit" value="Edit" class="btn btn-success">
                    </form>
                </td>
                </tr>
            <?php endwhile; ?>


        </table>
    </div>
    <div class="footer">

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="submit" value="Add" class="btn">
        </form>

    </div>
</div>

</body>
</html>