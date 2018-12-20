<?php
include('php/login.php'); // Includes Login Script
if (isset($_SESSION['benutzername'])) {
    header("location: index.php"); // Redirecting To Profile Page
}
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="a web application for videos about physical education">
    <meta name="author" content="Simon Isler">

    <title>SportClips</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="shortcut icon" href="#"/>
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">SportClips</h1>
    <br>
    <label for="benutzername" class="sr-only">Benutzername</label>
    <input type="text" name="benutzername" id="benutzername" class="form-control" placeholder="Benutzername" required autofocus>
    <label for="passwort" class="sr-only">Passwort</label>
    <input type="password" name="passwort" id="passwort" class="form-control" placeholder="Passwort" style="margin-top: 7%;" required>
    <p><?php echo $error; ?></p>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="anmelden">Anmelden</button>
    <p class="mt-5 mb-3 text-muted" style="text-align: center;"><a href="register.php">Noch nicht registriert?
            Registrieren</a><br><br><a href="index.php">Oder als Gast anmelden</a></p>
</form>
</body>
</html>
