<?php

include("commonRegister/header.php") ?>

<div class="col-lg-6">
    <form method="post" action="?page=registerPlace">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="nazwalokalu">Nazwa lokalu</label>
                    <input type="text" class="form-control" name="namePlace"
                           placeholder="Wpisz nazwe lokalu">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="
                    <?php
                    if (isset($_GET['email'])) {
                        echo $_GET['email'];
                    } else {
                        echo $email;
                    }
                    ?>
                    " readonly="readonly">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="wlasciciel">Właściciel</label>
                    <input type="text" class="form-control" name="name" value="<?php
                    if (isset($name)) {
                        echo $name;
                    } else {
                        echo $_GET['name'] . " " . $_GET['surname'];
                    }
                    ?>" readonly="readonly">
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php
        if (isset($id)) {
            echo $id;
        } else {
            echo $_GET['id'];
        }
        ?>">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="haslo">Podaj hasło</label>
                    <input type="password" class="form-control" name="password" placeholder="Wpisz hasło">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="haslo2">Podaj hasło</label>
                    <input type="password" class="form-control" name="passwordAgain" placeholder="Wpisz hasło">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="miasto">Podaj Miasto</label>
                    <input type="text" class="form-control" name="miasto" placeholder="Wpisz Miasto">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="kod pocztowy">Podaj kod pocztowy</label>
                    <input type="text" class="form-control" name="kod" placeholder="Wpisz kod pocztowy">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-6">
                <div class="form-group">
                    <label for="ulica">Podaj Ulice</label>
                    <input type="text" class="form-control" name="ulica" placeholder="Wpisz Ulice">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="ulica">Podaj numer bloku</label>
                    <input type="text" class="form-control" name="numerbloku" placeholder="nr. bloku">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="ulica">mieszkania</label>
                    <input type="text" class="form-control" name="numermieszkania" placeholder="nr. mieszkania">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="napis"><i>Rejestrując się akceptujesz regulamin serwisu dostępny
                        <a href="?page=statute" style="text-decoration: none; color: inherit;"><b>TUTAJ</b></a></i>!
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary buttonDefault buttonDark">Zarejestruj się</button>
            </div>
        </div>

    </form>
    <div class="formPole">
        <?php
        if (isset($messages)) {
            foreach ($messages as $message) {
                echo "<div class=\"napisRed\">$message</div>";
            }
        }
        ?>
    </div>
</div>







<?php include("commonRegister/footer.php"); ?>
