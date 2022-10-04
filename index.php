<?php
require_once "inc/config.php";
require_once "inc/controller/session.php";
require_once "inc/model/moment.php";

$moment = new Moment();

$moments = $moment->listAll();
$moments_all = $moments->fetchAll();
$moments_count = $moments->rowCount();

$page_title = "Dashboard";

if (isset($_GET['moment_id'])) {
    $moment->setId($_GET['moment_id']);
    if ($moment->delete()) {
        echo "<script>window.alert('Momento excluido com sucesso!');</script>";
        echo "<script>location.href = '" . $config->url . "/';</script>";
    }
}

require_once "inc/views/header.php";
require_once "inc/views/navbar.php";
?>
<div class="container mt-5 pb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="pb-2">Oi, <b><?php echo $strow["name"]; ?></b>. Bem vindo á Dashboard.</h3>
                <a href="create.php">Criar momento</a>
            </div>
            <?php if ($moments_count > 0) { ?>
                <div class="row">
                    <?php
                    foreach ($moments_all as $index => $moment_row) {
                        $images = explode(',', $moment_row['moment_attachments']);

                        $label = $moment_row['moment_label'];
                        $description = $moment_row['moment_description'];

                        $label_ellipsi = strlen($label) > 30 ? substr($label, 0, 30)."..." : $label;
                        $description_ellipsi = strlen($description) > 100 ? substr($description, 0, 100)."..." : $description;
                    ?>
                        <div class="col-md-6 <?php echo ($index > 1) ? "mt-5" : ""; ?>">
                            <div class="card card-moment">
                                <?php if ($moment_row['moment_attachments'] <> "") { ?>
                                    <div class="moment-image">
                                        <?php if (count($images) >= 2) { ?>
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <?php foreach ($images as $index => $image) { ?>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index; ?>" class="<?php echo ($index === 0) ? "active" : ""; ?>" style="
                    width: 10px;
                    height: 10px;
                    border-radius: 50%;
                    margin-right: 5px;
                    margin-left: 5px;"></li>
                                                    <?php } ?>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <?php foreach ($images as $index => $image) { ?>
                                                        <div class="carousel-item <?php echo ($index === 0) ? "active" : ""; ?>">
                                                            <img class="d-block w-100" src="<?php echo $image; ?>" alt="" />
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        <?php } else { ?>
                                            <img class="card-img-top" src="<?php echo $moment_row['moment_attachments']; ?>" alt="" />

                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="moment/<?php echo $moment_row['moment_id']; ?>"><?php echo $label_ellipsi; ?></a></h5>
                                    <p class="card-text text-muted">
                                        <?php if ($moment_row['moment_description'] <> "") { ?>
                                            <?php echo $description_ellipsi; ?>
                                        <?php } else { ?>
                                            Sem descrição
                                        <?php } ?>
                                    </p>
                                </div>
                                <div class="card-footer p-0">
                                    <a class="btn btn-delete btn-block" href="?moment_id=<?php echo $moment_row["moment_id"]; ?>" onclick="return confirm('Deseja mesmo excluir?'); ">
                                        Excluir
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="card card-form">
                    <div class="card-body empty text-center">
                        <div class="empty-image pb-3">
                            <img src="assets/images/moments_empty.svg" class="img-fluid" onload="SVGInject(this)" />
                        </div>
                        <span class="empty-title">
                            Nenhum momento encontrado
                        </span>
                        <small class="empty-description mt-3 pb-4">
                            Salve seu momento favorito agora mesmo
                        </small>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require_once "inc/views/footer.php"; ?>