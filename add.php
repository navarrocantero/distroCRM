<?php
include_once 'config.php';
include_once 'connectDb.php';
$errorString = '';

$errors = [

    'email_invalido' => '',
    'password_diferentes' => '',
    'password_corto' => '',
    'password_invalido_guion' => '',
    'password_invalido_espacio' => ''];

$passwordNecesaryValidations = count($errors);

if (!empty($_POST)) {

    $count = $passwordNecesaryValidations;
    $countTwo = 0;
    $email = htmlspecialchars($_POST ['email']);
    $password = (htmlspecialchars($_POST ['password']));
    $passwordConf = (htmlspecialchars($_POST ['password-conf']));
    $passwordIterable = str_split($password);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $count--;
        $errors['email_invalido'] = " El email introducido no es valido\n";

    }

//Comprobacion si es la misma password
    if ($password !== $passwordConf) {
        $count--;
        $errors['password_diferentes'] = " Los passwords son diferentes\n";

    }

//Comprobacion si tiene el tamaño necesario
    if (strlen($password) < 8) {
        $count--;
        $errors['password_corto'] = " Minimo 8 caracteres\n";

    }

//Comprobacion si contiene espacios
    for ($i = 0; $i < strlen($password); $i++) {
        if ($passwordIterable[$i] == ' ') {
            $count--;
            $errors['password_invalido_espacio'] = " No puede contener espacios\n";
            break;
        }
    }

    //Comprobacion si contiene la aguja en el pajar ()
    if (strpos($password, '_') == false) {
        $count--;
        $errors['password_invalido_guion'] = " No contiene guiones bajos\n";
    }

  // Si todas las validaciones son correctas se ejecuta la sentencia SQL
    if ($passwordNecesaryValidations === $count) {
        $sql = "INSERT INTO clientes (email,password) VALUES (:email, :password)";

        $result = $pdo->prepare($sql);

        $result->execute([
            'email' => $email,
            'password' => $password
        ]);
        header('Location: indegx.php');
    } else {

   //Sino se indica los errores que ha habido y de que tipo
        $errorsToPrint = "";
        foreach ($errors as $singleError) {
            if ($singleError !== '') {
                $errorsToPrint .= $singleError . "\n";
            }
        }

        // Si hay solo un numero de diferencia se imprimira error en singular
        if ($count - $passwordNecesaryValidations === 1) {

            $errorString = 'Error :' . $errorsToPrint;
        } // Sino se imprimira errores en plural
        else {
            $errorString = "Errores :" . $errorsToPrint;
        }
    }


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de clientes</title>
</head>
<body>
<h1>Listado de clientes</h1>
<div class="container">
    <form action="add.php" method="post">

        <div class="form-group">

            <div class="form-control">
                <label for="correo">Email</label>
                <input type="text" id="correo" name="email" required>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password-conf" name="password-conf" required>
            </div>

            <?php if ($errorString != ''): ?>
                <p class="bg-danger"><?= $errorString ?></p>
            <?php endif; ?>
            <input type="submit" class="btn btn-primary" value="Guardar"/>
    </form>
</div>
<ul>
    <li><a href="indegx.php"> Back</a></li>
</ul>

</body>
</html>