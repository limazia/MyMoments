<?php
require_once "../inc/views/header.php"; 
require_once "../inc/views/navbar.php";
require_once "../inc/class/grupo.php";


$group = new grupo(); 
$group_result = $group->buscarTodos(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>

</body>

</html>

<div class="container">
    <div id="form">
        <h4>Inserir Produto</h4>
        <form action="../inc/controller/produto/inserir_produto.php" method="POST">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label>Grupo</label>
                <select class="form-control" name="id_grupo">
                    <?php foreach ($group_result as $group_row){ ?>
                    <option value="<?php echo $group_row['id']; ?>"><?php echo $group_row['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input type="number" name="preco" class="form-control" value="" required>
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <textarea name="descricao" class="form-control" aria-label="With textarea"></textarea>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label">Imagem</label>
        </div>
    </div>
    <button type="submit" class="btn btn-dark">Inserir</button>
    <button id="btcancel" class="btn btn-dark">Cancelar</button>
</div>


</div>
</div>

<?php require_once "../inc/views/footer.php"; ?>