<?php
if(!in_array('ROLE_PLACE', $_SESSION['role']) && !in_array('ROLE_ADMIN', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}

?>