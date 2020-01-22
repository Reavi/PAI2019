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
                    <button class="btn btn-primary btn-block buttonLight" disabled>Zarządzanie profilem</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=compareprices">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Aktualne rezerwacje</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=favoriteplaces">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Zobacz oceny użytkowników
                    </button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=menu">
                    <button class="btn btn-primary btn-block buttonLight">Menu</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=paymenthistory">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Promocje</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=profile">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Statystyki</button>
                </a>
            </li>
            <li class="nav-item menuPole">
                <a class="nav-link" href="?page=profile">
                    <button class="btn btn-primary btn-block buttonLight" disabled>Konto</button>
                </a>
            </li>
            <?php
            if (isset($_SESSION['id'])) {
                ?>
                <li class="nav-item menuPole">
                    <a class="nav-link" href="?page=board">
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
                <a class="nav-link" href="?page=errorPlace">
                    <button class="btn btn-primary btn-block buttonLight">Zgłość problem</button>
                </a>

            </li>
        </ul>
    </div>
</div>