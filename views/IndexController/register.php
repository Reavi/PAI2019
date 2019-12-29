<?php include("mainIndex.php") ?>

    <div class="content">
        <form id="registerForm" method="post" action="?page=register">
            <div class="formPole">
                <div class="opis">Imię</div>
                <input class="pole" type="text" name="name">
            </div>
            <div class="formPole">
                <div class="opis">Nazwisko</div>
                <input class="pole" type="text" name="surname">
            </div>
            <div class="formPole">
                <div class="opis">E-mail</div>
                <input class="pole" type="email" name="email">
            </div>
            <div class="formPole">
                <div class="opis">Data Urodzenia</div>
                <input class="pole" type="date" name="birthdate">
            </div>
            <div class="formPole">
                <div class="opis">Hasło</div>
                <input class="pole" type="password" name="password">
            </div>
            <div class="formPole">
                <div class="opis">Powtórz Hasło</div>
                <input class="pole" type="password" name="passwordAgain">
            </div>
            <div class="formPole">
                <div class="napis"><i>Rejestrując się akceptujesz regulamin serwisu dostępny <a href="?page=statute" style="text-decoration: none; color: inherit;"><b>TUTAJ</b></a></i>!</div>
            </div>
            <div class="formPole">
                <button id="register" class="buttonDefault buttonDark">Zarejestruj się</button>
            </div>
        </form>
        <div class="formPole">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo "<div class=\"napisRed\">$message</div>";
                }
            }
            ?>
        </div>
        <div class="formPole" style="margin-top:2em;">
            <div class="napis"><i>Posiadasz konto?</i>!</div>
        </div>
        <div class="formPole">
            <a href="?page=index"><button id="register" class="buttonDefault buttonLight">Zaloguj się</button></a>
        </div>
    </div>


<?php include("footer.php"); ?>