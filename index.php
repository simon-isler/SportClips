<?php
include('php/session.php');

if(!isset($_SESSION['login_user'])){
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
    <link rel="shortcut icon" href="#" />
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">SportClips</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Video suchen..." aria-label="Search">
            <button type="button" class="btn btn-outline-danger">Abmelden</button>
        </form>
    </div>
</nav>

<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">SportClips</h1>
            <p class="lead">Wilkommen, USER!</p>
        </div>
    </div>

    <div class="container-fluid">
        <!-- List group -->
        <div class="list-group" id="myList" role="tablist">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#alle" role="tab">Alle</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#psychologie" role="tab">Psychologie</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#diskus" role="tab">Diskus</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#parcours" role="tab">Parcours</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#speerwurf" role="tab">Speerwurf</a>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="alle" role="tabpanel">
                <video width="600" height="500" controls>
                    <source src="clips/Diskus.mp4" type="video/mp4">
                </video>
            </div>
            <div class="tab-pane" id="psychologie" role="tabpanel">b</div>
            <div class="tab-pane" id="diskus" role="tabpanel">c</div>
            <div class="tab-pane" id="parcours" role="tabpanel">d</div>
            <div class="tab-pane" id="speerwurf" role="tabpanel">e</div>
        </div>
    </div> <!-- /container -->
</main>

<!-- Custom file first, then jQuery, then Popper.js, then jquery.validate.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>