<?php
if(isset($_SESSION['id']) and isset($_SESSION['role']) and isset($_SESSION['card'])) {
    if($_SESSION['card']!=true){
        header('Location: ?page=board');
    }

}

?>


    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="Stylesheet" type="text/css" href="public/css/style.css" />
        <link rel="Stylesheet" type="text/css" href="public/css/styleIndex.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Wirtualny Kelner</title>
    </head>
    <body>
    <div class="container">
        <div class="main">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <div class="title">
                <h1>Wirtualny kelner</h1>
            </div>
            <div>
                <div style="text-align: center;">Zaloguj się aby zacząć korzystać</br>z naszej aplikacji!</div>
            </div>
        </div>

    <div class="content">
        <form action="?page=addcard" method="post">
            <div class="formPole">
                <div class="napis"><b>Wspaniale!</b> Potwierdziliśmy adres Email,
                aby dokończyć zakładanie konta dodaj kartę kredytową lub debetową i zacznij cieszyć się naszą aplikacją!
                </div>
            </div>
            <div class="formPole">
                <div class="napis numbercart">NUMER KARTY</div>
                <input class="pole" type="text" name="nb" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>
            <div class="formPole row" style="justify-content: center; margin:0;margin-bottom:1em;">
                <div class="napis col-sm-6">DATA WAŻNOŚCI</div><div class="napis col-sm-6">KOD CVV</div>
                <input class="pole col-sm-6" name="data" type="date"><input name="cvv" class="pole col-sm-6" type="text">
            </div>
            <div class="formPole">
                <div class="napis numbercart">IMIĘ i NAZWISKO</div>
                <input class="pole" name="name" type="text">
            </div>
            <div class="formPole">
                <div class="napis"><i>W celu potwierdzenaia autetyczności karty, z konta zostanie pobrany 1 grosz, który zostanie odbity przy pierwszej płatności w aplikacji</i>
                </div>
            </div>
            <div class="formPole">
                <button class="buttonDefault buttonDark">Dodaj kartę</button>
            </div>
        </form>
    </div>
<?php include("footer.php"); ?>