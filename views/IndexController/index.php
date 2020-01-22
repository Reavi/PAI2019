<?php include("mainIndex.php") ?>

    <div class="content">
        <div class="formPole">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo "<div class=\"napisRed\">$message</div>";
                }
            }
            ?>
        </div>
        <form id="login" method="post" action="?page=login">
            <div class="formPole">
                <div class="opis">E-mail</div>
                <input class="pole" type="email" name="email">
            </div>
            <div class="formPole">
                <div class="opis">Hasło</div>
                <input class="pole" type="password" name="password">
            </div>
            <div class="formPole">
                <button class="buttonDefault buttonLight">Zaloguj się</button>
            </div>
        </form>

        <div class="formPole">
            <div class="napis">Nie masz konta? Zarejestruj się!</div>
        </div>
        <div class="formPole">
            <a href="?page=register"><button  id="register" class="buttonDefault buttonDark">Zarejestruj się</button></a>
        </div>


    </div>


<?php include("footer.php"); ?>