<?php
require_once "inc/config.php";
require_once "inc/controller/session.php";

$page_title = "Painel";

require_once "inc/views/header.php";
require_once "inc/views/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="my-5">Oi, <b><?php echo $strow["name"]; ?></b>. Bem vindo á Dashboard.</h1>
            <p>
                <a href="lista_produto.php" class="btn btn-warning">Produtos</a>
                <a href="lista_grupo.php" class="btn btn-warning">Grupos</a>
                <a href="logout.php" class="btn btn-danger">SAIR</a>
            </p>
        </div>
    </div>
</div>
<?php require_once "inc/views/footer.php"; ?>