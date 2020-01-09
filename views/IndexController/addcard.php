<?php include("mainIndex.php"); ?>

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