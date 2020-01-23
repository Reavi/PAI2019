<div class="menu">
    <div class="row panelTop">

        <div class="col menuPole">
            <div class="row center">
                <div class="col">
                    <img src="public/img/Profile.png">
                </div>
            </div>
            <div class="row center Text opisTextColor" style="margin-top: 2em">
                <div clas="col-12">
                    <?= $user->getName(); ?>
                    <?= $user->getSurname(); ?>
                </div>
                <?php
                if (count($user->getRole()) > 1) { ?>

                    <div class="col-12">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="przykladowaLista"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Skocz do innego miejsca
                            </button>
                            <div class="dropdown-menu" aria-labelledby="przykladowaLista">
                                <a class="dropdown-item" href="?page=board">Aplikacja</a>
                                <?php
                                if (in_array('ROLE_ADMIN', $_SESSION['role'])) {
                                    echo "<a class=\"dropdown-item\" href=\"?page=admin\">Admin panel</a>";
                                }
                                if (in_array('ROLE_MANAGER', $_SESSION['role'])) {
                                    echo "<a class='dropdown-item' href='?page=manager'>Manager panel</a>";
                                }
                                if (in_array('ROLE_PLACE', $_SESSION['role'])) {
                                    if (isset($lokale)) {
                                        foreach ($lokale as $lokal) {
                                            echo "<div class=\"dropdown-divider\"></div>";
                                            echo "<a class='dropdown-item' href='?page=place&id=" . $lokal['IdLokal'] . "'>" . $lokal['NazwaLokalu'] . "</a>";
                                        }

                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
                    <button class="btn btn-primary btn-block buttonLight">Historia rezerwacji</button>
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
