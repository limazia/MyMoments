<?php
// inclui os arquivos .php
require_once '../inc/config.php';
require_once '../inc/class/produto.php';

$product = new produto();
$product_result = $product->buscarTodos();

require_once "../inc/views/header.php"; 
require_once "../inc/views/navbar.php";
?>

<div class="container text-center">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Lista de produtos</h4>
                        <a href="./inserir_produto.php">Criar produto</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produto</th>
                                <th>Valor</th>
                                <th>Descrição</th>
                                <th>Grupo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($product_result as $product_row) { ?>
                                <tr>
                                    <td><?php echo $product_row['id']; ?></td>
                                    <td><?php echo $product_row['nome']; ?></td>
                                    <td><?php echo $product_row['preco']; ?></td>
                                    <td><?php echo $product_row['descricao'] == null ? "Não ha descrição" : $product_row['descricao']; ?></td>
                                    <td><?php echo $product_row['id_grupo']; ?></td>
                                    <td>jaja eu arrumo</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "../inc/views/footer.php"; ?>