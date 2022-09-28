<?php
require_once 'inc/config.php';
require_once 'inc/controller/session.php';

$words = explode(" ", $strow["name"]);
?>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-main navbar-light">
            <a class="navbar-brand" href="/admin">
                <span class="logo-text">MyMoments</span>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown dropdown-menu-right">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <span class="username"><?php echo $words[0]; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/settings">
                                <i class="far fa-user"></i> Conta
                            </a>
                            <hr class="dropdown-divider" />
                            <a class="dropdown-item logout" href="logout.php">
                                <i class="fas fa-power-off"></i> Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>