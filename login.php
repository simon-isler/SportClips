<?php
include ('php/db.php');
include('php/login/login.php'); // Includes Login Script

if (isset($_SESSION['benutzername'])) {
    header("location: index.php"); // redirecting to index
}

// disable errors
error_reporting(0);
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
    <p class="error"><?php echo $error; ?></p>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="anmelden">Anmelden</button>
    <p class="mt-5 mb-3 text-muted" style="text-align: center;"><a href="register.php">Noch nicht registriert?
            Registrieren</a><br><br><a href="php/login/guest.php">Oder als Gast anmelden</a></p>
</form>

<!-- Custom file first, then jQuery, then jquery.validate.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
