<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="public/css/styleIndex.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Wirtualny Kelner</title>
</head>
<body>
<div class="container">
    <?php include("mainIndex.php") ?>

    <div class="content">
        <form id="register">
            <div class="formPole">
                <div class="opis">Imię i Nazwisko</div>
                <input class="pole" type="text" name="email">
            </div>
            <div class="formPole">
                <div class="opis">E-mail</div>
                <input class="pole" type="email" name="email">
            </div>
            <div class="formPole">
                <div class="opis">Data Urodzenia</div>
                <input class="pole" type="date" name="email">
            </div>
            <div class="formPole">
                <div class="opis">Hasło</div>
                <input class="pole" type="password" name="password">
            </div>
            <div class="formPole">
                <div class="opis">Powtórz Hasło</div>
                <input class="pole" type="password" name="password">
            </div>
            <div class="formPole">
                <div class="napis"><i>Rejestrując się akceptujesz regulamin serwisu dostępny <a href="?page=statute" style="text-decoration: none; color: inherit;"><b>TUTAJ</b></a></i>!</div>
            </div>
            <div class="formPole">
                <button id="register" class="buttonDefault buttonDark">Zarejestruj się</button>
            </div>
        </form>

        <div class="formPole" style="margin-top:2em;">
            <div class="napis"><i>Posiadasz konto?</i>!</div>
        </div>
        <div class="formPole">
            <a href="?page=index"><button id="register" class="buttonDefault buttonLight">Zaloguj się</button></a>
        </div>
    </div>
</div>

<script src="public/js/scriptIndex.js"></script>
</body>
</html>