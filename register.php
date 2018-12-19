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
<form class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center;">SportClips</h1>
    <p>Wilkommen! Geben Sie hier ihre Benutzerdaten ein.</p>
    <br>
    <div class="form-group">
        <label for="benutzername">Benutzername</label>
        <input type="text" class="form-control" id="benutzername" placeholder="Benutzername" required>
    </div>
    <div class="form-group">
        <label for="passwort1">Passwort</label>
        <input type="password" class="form-control" id="passwort1" placeholder="Passwort" required>
    </div>
    <div class="form-group">
        <label for="passwort2">Passwort wiederholen</label>
        <input type="password" class="form-control" id="passwort2" placeholder="Passwort wiederholen" required>
    </div>
    <div class="radios">
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="radios" id="radio1" checked>Lehrer
        </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="radios" id="radio2">SchülerIn
        </label>
    </div>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrieren</button>
    <p class="mt-5 mb-3 text-muted" style="text-align: center;"><a href="login.php">Zurück zum Login</a></p>
</form>
</body>
</html>
