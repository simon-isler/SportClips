<?php
    include('php/login/session.php');
    include ('php/login/logout.php');

    if($_SESSION['benutzername'] == ""){
        header("location: login.php"); // redirecting to login
    }

    if ($_SESSION['benutzername'] == "Gast") {
        $role = "Gast";
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
    <a class="navbar-brand" href="#">SportClips</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Video suchen..." aria-label="Search">
            <button type="submit" class="btn btn-outline-danger" name="abmelden">Abmelden</button>
        </form>
    </div>
</nav>

<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">SportClips</h1>
            <p class="lead">Wilkommen, <?php echo $benutzername;?>!</p>
        </div>
    </div>

    <div class="container-fluid">
            <div class="row">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="alle" data-toggle="list" href="#list-alle" role="tab" aria-controls="home">Alle</a>
                    <a class="list-group-item list-group-item-action" id="psychologie" data-toggle="list" href="#list-psychologie" role="tab" aria-controls="profile">Psychologie</a>
                    <a class="list-group-item list-group-item-action" id="diskus" data-toggle="list" href="#list-diskus" role="tab" aria-controls="messages">Diskus</a>
                    <a class="list-group-item list-group-item-action" id="speerwurf" data-toggle="list" href="#list-speerwurf" role="tab" aria-controls="settings">Speerwurf</a>
                    <a class="list-group-item list-group-item-action" id="parcours" data-toggle="list" href="#list-parcours" role="tab" aria-controls="settings">Parcours</a>
                </div>

                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-alle" role="tabpanel" aria-labelledby="alle">

                                    <div class="col-md-4">
                                        <div class="card mb-4 box-shadow">
                                            <video class="card-img-top">
                                                <source src="clips/Diskus.mp4#t=0.1" type="video/mp4">
                                            </video>
                                            <div class="card-body">
                                                <p class="card-text">Text</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                        </div>
                        <div class="tab-pane fade" id="list-psychologie" role="tabpanel" aria-labelledby="psychologie">...</div>
                        <div class="tab-pane fade" id="list-diskus" role="tabpanel" aria-labelledby="diskus">...</div>
                        <div class="tab-pane fade" id="list-speerwurf" role="tabpanel" aria-labelledby="speerwurf">...</div>
                        <div class="tab-pane fade" id="list-parcours" role="tabpanel" aria-labelledby="parcours">...</div>
                    </div>
                </div>
            </div>
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