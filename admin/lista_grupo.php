<?php
// inclui os arquivos .php
require_once '../inc/config.php';
require_once '../inc/class/grupo.php';

$group = new grupo();
$group_result = $group->buscarTodos();

require_once "../inc/views/header.php"; 
require_once "../inc/views/navbar.php";
?>

<div class="container text-center">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Lista de grupos</h4>
                        <a href="./inserir_grupo.php">Criar grupo</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($group_result as $group_row) { ?>
                                <tr>
                                    <td><?php echo $group_row['id']; ?></td>
                                    <td><?php echo $group_row['nome']; ?></td>
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