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
    <div class="menu">
        <div class="row panelTop">

            <div class="col menuPole">
                <div class="row center">
                    <div class="col">
                        <img src="public/img/Profile.png">
                    </div>
                </div>
                <div class="row center Text opisTextColor" style="margin-top: 2em">
                    <div clas="col">
                        <?= $user->getName();?>
                        <?= $user->getSurname();?>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">

        </div>
        <div class="navbar center" >
            <ul class="navbar-nav">
                <li class="menuPole nav-item ">
                    <a class="nav-link" href="?page=board"><button class="btn btn-primary btn-block buttonLight">Znajdź Lokal</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=compareprices"><button class="btn btn-primary btn-block buttonLight" disabled>Porównaj ceny dania</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=favoriteplaces"><button class="btn btn-primary btn-block buttonLight" disabled>Ulubione lokale</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=bookinghistory"><button class="btn btn-primary btn-block buttonLight" disabled>Historia rezerwacji</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=paymenthistory"><button class="btn btn-primary btn-block buttonLight" disabled>Historia płatności</button></a>
                </li>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=profile"><button class="btn btn-primary btn-block buttonLight" disabled>Profil</button></a>
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


        <div class="navbar bottomPositionContent">
            <ul class="navbar-nav ">
                <li class="nav-item menuPole ">
                    <a class="nav-link" href="?page=error"><button class="btn btn-primary btn-block buttonLight" disabled>Zgłość problem</button></a>

                </li>
            </ul>
        </div>



    </div>



    <div class="col content">
        <div class="row headerContent">
            <div class="col-md-8 bottomPosition">
                <h1 class="bottomPositionContent textArial bottomPositionContentCenter"><?= $title?></h1>
            </div>
            <div class="col-md-4">
                <div clas="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <img align="center" src="public/img/logo.svg" width="50%" height="50%">
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="Text logoTextColor">
                            <h1>Wirtualny Kelner</h1>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <?php include('page/findplace.php');
        ?>




    </div>
</div>
</div>
<script src="public/js/scriptIndex.js"></script>
</body>
</html>