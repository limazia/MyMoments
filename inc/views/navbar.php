<?php
require_once 'inc/config.php';
require_once 'inc/controller/session.php';

$words = explode(" ", $strow["name"]);
?>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-main navbar-light">
            <a class="navbar-brand" href="<?php echo $config->url; ?>">
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
                            <a class="dropdown-item" href="settings.php">
                                Minha conta
                            </a>
                            <hr class="dropdown-divider" />
                            <a class="dropdown-item logout" href="logout.php">
                                Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>