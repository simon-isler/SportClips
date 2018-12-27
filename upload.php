<?php
include('php/login/session.php');
include('php/login/logout.php');
include ('php/video/upload.php');

if ($_SESSION['benutzername'] == "" || $role == "Gast") {
    header("location: login.php"); // redirecting to login
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/cards.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">SportClips</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post">
            <div class="full">
                <button type="submit" class="btn btn-outline-danger" name="abmelden">Abmelden</button>
            </div>
        </form>
    </div>
</nav>

<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Upload</h1>
        </div>
    </div>

    <div class="container-fluid">
        <img src="img/back.png" alt="Back" onclick="history.back()" class="back">
        <form class="upload" method="post" action="php/video/upload.php">
            <div class="form-group">
                <label for="file">Datei</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <div class="form-group">
                <label for="kategorie">Kategorie</label>
                <select class="form-control" id="kategorie">
                    <option>Alle</option>
                    <option>Psychologie</option>
                    <option>Diskus</option>
                    <option>Speerwurf</option>
                    <option>Parcours</option>
                </select>
            </div>
            <p><?php echo $msg; ?></p>
            <button type="submit" class="btn btn-primary" name="hochladen">Hochladen</button>
        </form>
    </div>
</main>

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