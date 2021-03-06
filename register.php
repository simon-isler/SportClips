<?php
    include 'php/db.php';
    include 'php/login/register.php';
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

<body>
<form class="form-signin" method="post" action="">
    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center;">SportClips</h1>
    <p style="text-align: center; font-style: italic;">Wilkommen! Geben Sie hier ihre Benutzerdaten ein.</p>
    <div class="form-group">
        <label for="benutzername">Benutzername</label>
        <input type="text" class="form-control" name="benutzername" id="benutzername" placeholder="Benutzername" maxlength="45" required>
    </div>
    <div class="form-group">
        <label for="passwort1">Passwort</label>
        <input type="password" class="form-control" name="passwort1" id="passwort1" placeholder="Passwort" maxlength="45" required>
    </div>
    <div class="form-group">
        <label for="passwort2">Passwort wiederholen</label>
        <input type="password" class="form-control" name="passwort2" id="passwort2" placeholder="Passwort wiederholen" maxlength="45" required>
    </div>
    <div class="radios">
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="radio" id="radio1" value="Lehrer" checked>Lehrer
        </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="radio" id="radio2" value="Schueler">SchülerIn
        </label>
    </div>
    </div>
    <p class="error"><?php echo $msg; ?></p>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="registrieren">Registrieren</button>
    <p class="mt-5 mb-3 text-muted" style="text-align: center;"><a href="login.php">Zurück zum Login</a></p>
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
