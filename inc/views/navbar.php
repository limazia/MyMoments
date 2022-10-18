<?php
require_once 'inc/config.php';
require_once 'inc/controller/session.php';
?>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-main navbar-light">
            <a class="navbar-brand" href="<?php echo $config->url; ?>/">
                <span class="logo-text">MyMoments</span>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown dropdown-menu-right">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <span class="username"><?php echo $strow["name"]; ?>
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo $config->url; ?>/settings.php">
                                Minha conta
                            </a>
                            <hr class="dropdown-divider" />
                            <a class="dropdown-item logout" href="<?php echo $config->url; ?>/logout.php">
                                Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>