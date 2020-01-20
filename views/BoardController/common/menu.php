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
                    <?= $user->getName(); ?>
                    <?= $user->getSurname(); ?>
                </div>
            </div>

        </div>
    </div>
    <div class="row">

    </div>
    <div class="navbar center">
        <ul class="navbar-nav">
            <li class="menuPole nav-item ">
                <a class="nav-link" href="?page=board">
                    <button class="btn btn-primary btn-block buttonLight">Znajdź Lokal</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=compareprices">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Porównaj ceny dania</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=favoriteplaces">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Ulubione lokale</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=bookinghistory">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Historia rezerwacji</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=paymenthistory">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Historia płatności</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=profile">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Profil</button>
                </a>
            </li>

            <?php
            if (in_array('ROLE_ADMIN', $_SESSION['role'])) { ?>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=admin">
                        <button class="btn btn-primary btn-block buttonLight">Admin Panel</button>
                    </a>
                </li>
                <?php
            }
            ?>

            <?php
            if (in_array('ROLE_ADMIN', $_SESSION['role']) || in_array('ROLE_MENEGER', $_SESSION['role'])) {
                ?>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=manager">
                        <button class="btn btn-primary btn-block buttonLight">Manager Panel</button>
                    </a>
                </li>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION['idPlace'])) {
                ?>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=place">
                        <button class="btn btn-primary btn-block buttonLight">Lokal Panel</button>
                    </a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=logout">
                    <button class="btn btn-primary btn-block buttonLight">Wyloguj</button>
                </a>
            </li>
        </ul>
    </div>


    <div class="navbar bottomPositionContent">
        <ul class="navbar-nav ">
            <li class="nav-item menuPole ">
                <a class="nav-link" href="?page=errorBoard">
                    <button class="btn btn-primary btn-block buttonLight">Zgłość problem</button>
                </a>

            </li>
        </ul>
    </div>


</div>
