<?php
if (!in_array('ROLE_PLACE', $_SESSION['role']) && !in_array('ROLE_ADMIN', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}

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

            <div class="row">
                <div class="col">
                    cos tam
                </div>
            </div>


        </div>
    </div>
</div>
<script src="public/js/scriptIndex.js"></script>
</body>
</html>
