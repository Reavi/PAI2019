<?php
if(!in_array('ROLE_MANAGER', $_SESSION['role']) && !in_array('ROLE_ADMIN', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="public/css/manager.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Manager Space</title>
</head>
<body>
<div class="container">
    <!--start-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Wirtualny Kelner</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?page=manager">Strona Główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=addnewplace">Dodaj nową placówkę</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lista w dol
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Miejsca w serwisie
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=board">Board</a>
                        <!--admin panel-->
                        <?php
                        if(in_array('ROLE_ADMIN', $_SESSION['role'])) {?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?page=admin">Admin panel</a> <?php
                        }
                        ?>
                        <!--end-->
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="?page=logout"><span class="fa fa-user"></span> Wyloguj się</a></li>
            </ul>
        </div>
    </nav>
    <!--end menu-->