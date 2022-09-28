<?php
require_once "inc/config.php";
require_once "inc/controller/session.php";
require_once "inc/controller/update_moment.php";
require_once "inc/model/moment.php";

$moment = new Moment();

if (isset($_GET['moment_id'])) {
  $moment->setId($_GET['moment_id']);

  $read = $moment->getMomentById();
  $moment_row = $read->fetch();
  $moment_count = $read->rowCount();

  if ($moment_count == 0) {
    echo "<script>alert('Esse momento não existe');</script>";
    echo "<script>location.href = '" . $config->urlLocal . "/';</script>";
  }

  $page_title = "Editar ".$moment_row['moment_label'];
}

require_once "inc/views/header.php";
require_once "inc/views/navbar.php";
?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-12">
      <div class="card card-form">
        <div class="card-body">
          <h2>Editar momento</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <input type="hidden" name="moment_id" value="<?php echo $moment_row["moment_id"]; ?>">
            <div class="form-group">
              <input type="text" name="moment_label" class="form-control <?php echo (!empty($label_err)) ? 'is-invalid' : ''; ?>" placeholder="Nome" value="<?php echo $moment_row["moment_label"]; ?>">
              <span class="invalid-feedback"><?php echo $label_err; ?></span>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="moment_description" rows="4" placeholder="Descrição"><?php echo $moment_row["moment_description"]; ?></textarea>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="moment_attachments" rows="5" placeholder="Imagens (separe os links por virgula)"><?php echo $moment_row["moment_attachments"]; ?></textarea>
            </div>
            <?php if (isset($errorMSG)) { ?>
              <div class="alert alert-<?php echo ($errorType == "success") ? "success" : $errorType; ?> alert-dismissible fade show">
                <?php echo $errorMSG; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } ?>
            <div class="form-group">
              <button type="submit" name="btn-update-moment" class="btn btn-update btn-block">Atualizar momento</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "inc/views/footer.php"; ?>