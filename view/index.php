<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="public/css/styleIndex.css" />
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
        <form id="login">
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
            <div class="formPole">
                <div class="napis">Nie masz konta? Zarejestruj się!</div>
            </div>
            <div class="formPole">
                <button class="buttonDefault buttonDark">Zarejestruj się</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>