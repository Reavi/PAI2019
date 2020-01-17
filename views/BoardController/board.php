<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
            die('You are not logged in!');
        }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
            die('You do not have permission to watch this page!');
        }

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="public/css/styleBoard.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Wirtualny Kelner</title>
</head>
<body>
<div class="container">
<div class="row leftpanel">
    <div class="col-lg-2 menu">
        <div class="row">

            <div class="col menuPole">
                Witaj!
                <?= $user->getName();?>
                <?= $user->getSurname();?>
            </div>
        </div>
        <div class="navbar " id="menumain">
            <ul class="navbar-nav">
                <li class="menuPole nav-item ">
                    <a class="nav-link" href="#"><button class="btn btn-primary btn-block buttonLight">Znajdź Lokal</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="#"><button class="btn btn-primary btn-block buttonLight">Porównaj ceny dania</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="#"><button class="btn btn-primary btn-block buttonLight">Ulubione lokale</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="#"><button class="btn btn-primary btn-block buttonLight">Historia rezerwacji</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="#"><button class="btn btn-primary btn-block buttonLight">Historia płatności</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="#"><button class="btn btn-primary btn-block buttonLight">Profil</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=logout"><button class="btn btn-primary btn-block buttonLight">Wyloguj</button></a>
                </li>
                <?php
                if(in_array('ROLE_ADMIN', $_SESSION['role'])) {
                    ?>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=admin"><button class="btn btn-primary btn-block buttonLight">Admin Panel</button></a>
                </li>
                <?php
                }
                ?>
                <?php
                if(in_array('ROLE_ADMIN', $_SESSION['role']) ||in_array('ROLE_MENEGER', $_SESSION['role']) ) {
                ?>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=manager"><button class="btn btn-primary btn-block buttonLight">Manager Panel</button></a>
                </li>
                <?php
                }
                ?>


            </ul>
        </div>
    </div>



    <div class="col-lg-10 content">
        <div class="row">
            <div class="col-xl">
                <?= $title?>
            </div>
        </div>


        <div class="row">
            <div class="col-xl">
                kontent
            </div>

        </div>
    </div>
</div>
</div>
<script src="public/js/scriptIndex.js"></script>
</body>
</html>