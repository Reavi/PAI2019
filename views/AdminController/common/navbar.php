<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="?page=board">
                    <i class="fas fa-snowboarding"></i> Board
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=manager">
                    <i class="fas fa-user"></i> Manager
                </a>
            </li>
            <?php
            if(in_array('ROLE_ADMIN', $_SESSION['role'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="?page=admin">
                        <i class="fas fa-users"></i> Admin panel
                    </a>
                </li>
            <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
        <div class="navbar-font-color">
            <i class="fas fa-user"></i> <?= $_SESSION['id'] ?>
        </div>

    </div>
</nav>