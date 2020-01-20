<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if (!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="public/css/style.css"/>
    <link rel="Stylesheet" type="text/css" href="public/css/styleBoard.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Wirtualny Kelner</title>
</head>
<body>
<div class="container">
    <div class="row leftpanel">
        <?php include('common/menu.php') ?>


        <div class="col content">
            <!--header content-->
            <?php include('common/headerContent.php'); ?>
            <!-- content content-->


            <?php
            include('page/findplace.php');
            ?>


        </div>
    </div>
</div>
<script src="public/js/scriptIndex.js"></script>
</body>
</html>