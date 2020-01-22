<?php

include("commonRegister/header.php") ?>

<div class="col-lg-6">
    <form method="post" action="?page=loginPlace">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Wpisz email">
        </div>
        <div class="form-group">
            <label for="haslo">Hasło</label>
            <input type="password" class="form-control" name="password" placeholder="Wpisz hasło">
        </div>
        <button type="submit" class="btn btn-primary buttonDefault buttonDark">Zaloguj się</button>


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
