<?php
require_once "../inc/views/header.php"; 
require_once "../inc/views/navbar.php"; ?>

<div class="container">
    <div id="form">
        <h4>Inserir Grupo</h4>
        <form action="../inc/controller/grupo/inserir_grupo.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nome:</span>
                <input type="text" name="nome" required>
            </div>
            <button type="submit" class="btn btn-dark">Inserir</button>
            <button id="btcancel" class="btn btn-dark">Cancelar</button>
        </form>
    </div>
</div>
<?php require_once "../inc/views/footer.php"; ?>
