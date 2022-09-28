<?php
require_once '../inc/config.php';
require_once '../inc/controller/session.php';

if (isset($_SESSION['uid']) == "") {
    header("Location: " . $config->urlLocal . "./admin/login.php");
    exit;
}

require_once "../inc/views/header.php"; 
require_once "../inc/views/navbar.php";
?>
<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
        <h1 class="my-5">Oi, <b><?php echo $strow["username"]; ?></b>. Bem vindo á Dashboard.</h1>
        <p>
        <a href="lista_produto.php" class="btn btn-warning">Produtos</a>
        <a href="lista_grupo.php" class="btn btn-warning">Grupos</a>
        <a href="logout.php" class="btn btn-danger">SAIR</a>
        </p>

        </div>
    </div>

<?php require_once "../inc/views/footer.php"; ?>