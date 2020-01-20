<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if(!in_array('ROLE_ADMIN', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="public/css/board.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <?php include('common/head.php'); ?>
    <title>picmash</title>
</head>
<body>
<?php include('common/navbar.php'); ?>
<div class="container">
    <div class="col-6">
        <table class="table mt-4 text-light">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Role</th>
            </tr>
            </thead>
            <tbody class="users-list">
            <tr>
                <th scope="row"><?= $user->getId(); ?></th>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getName(); ?></td>
                <td><?= $user->getSurname(); ?></td>
                <td><?= $user->getRoleToString(); ?></td>
            </tr>
            </tbody>
        </table>
        <button class="btn-primary btn-lg ml-0" type="button" onclick="getUsers()">
            Get all users
        </button>
    </div>
</div>
</body>
</html>
