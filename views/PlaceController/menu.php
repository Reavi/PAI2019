<?php

include('common/header.php');
?>

<body>
<div class="container">
    <div class="row leftpanel">
        <?php include('common/menu.php'); ?>

        <div class="col content">
            <!--header content-->
            <?php include('common/headerContent.php'); ?>
            <!-- content content-->

            <div class="row " style="margin-top: 2em">
                <div class="col-8">
                    <div id="ccc">
                        <?php

                        if (!isset($menu)) {
                            echo "<div class='infoBig textArial darkColorFont'>Brak Menu ! :( </br> Stwórz jakieś!</div>";
                        } else {
                            $id = "menuId" . $menu->getId();
                            ?>
                            <div id="contentMenu">
                                <div class="row">
                                    <div class="col-12 darkColorFont Text">
                                        <h1>Twoje Menu</h1>
                                    </div>

                                    <div id="<?= $id ?>" class="col-12">
                                        <button onclick="getMenu('<?= $id ?>')"
                                                class="btn btn-primary buttonDefault buttonDark MenuBatton">
                                            <?= $menu->getName() ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="contentMenuOne">
                                <div class="row">
                                    <div class="col-12 darkColorFont Text">
                                        <h1><?= $menu->getName() ?></h1>
                                    </div>
                                    <div class="col-12">


                                        <div class="row" style="border-style:solid; border-color:red">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-8">Nazwa</div>
                                                    <div class="col-4">Cena</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        Opis
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $positions = $menu->getPositionMenu();
                                        if (empty($positions)) {
                                            echo "<div class='textArial darkColorFont'>Brak Pozycji! :( </br> dodaj jakieś!</div>";
                                        } else {
                                            foreach ($positions as $pos) {
                                                ?>
                                                <div class="row"
                                                     style="border-style:solid; border-color:red; margin-top:1em;">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-8"><?= $pos['Nazwa'] ?></div>
                                                            <div class="col-4"><?= $pos['Cena'] ?></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <?= $pos['Opis'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12" id="rp">
                            <form method="post" action="?page=addNewMenu">
                                <div class="form-group">
                                    <label for="nm">Nazwa Menu</label>
                                    <input id="nm" type="text" class="form-control" name="name"
                                           placeholder="Wpisz nazwę ">
                                </div>
                                <button id=newMenuButton" class="btn btn-primary buttonDefault buttonLight">Dodaj nowe
                                    Menu
                                </button>
                            </form>
                            <?php
                            if (isset($messages)) {
                                foreach ($messages as $message) {
                                    echo "<div class=\"napisRed\">$message</div>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-12" id="prBack">
                            <button onclick="backMenu()" class="btn btn-primary buttonDefault buttonDark">
                                Wróc
                            </button>

                            <div style="height:1px;background-color:#FF0000;margin: 1em;"></div>

                            <form id="addPositionMenuForm">

                                <div class="form-group">
                                    <label>Nazwa Pozycji</label>
                                    <input type="text" class="form-control" name="name" placeholder="Wpisz nazwę ">
                                </div>
                                <div class="form-group">
                                    <label>Wpisz cene</label>
                                    <input type="text" class="form-control" name="price" placeholder="Wpisz cenę">
                                </div>
                                <div class="form-group">
                                    <label>Wpisz opis</label>
                                    <input type="text" class="form-control" name="description" placeholder="Wpisz opis">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="idmenu" placeholder="Wpisz nazwę "
                                           value="<?= $menu->getId() ?>" type="hidden">
                                </div>
                                <button type="button" onclick="addPositionMenuButton()"
                                        class="btn btn-primary buttonDefault buttonLight">
                                    Dodaj Pozycję
                                </button>
                            </form>

                            <script>
                                function addPositionMenuButton() {
                                    alert("S");
                                    const apiUrl = "http://krystianmielec.eu/kelner/";
                                    var data = $('#addPositionMenuForm').serialize();
                                    alert(data);
                                    $.ajax({
                                        url: apiUrl + '?page=addPositionMenu',
                                        data: data,
                                        dataType: 'json'
                                    }).done((res) => {
                                        alert(res);
                                    });
                                }
                            </script>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
<script src="public/js/scriptIndex.js"></script>
</body>
</html>
