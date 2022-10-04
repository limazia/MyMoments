<?php
require_once "inc/config.php";
require_once "inc/controller/session.php";
require_once "inc/controller/moment.php";

$page_title = "Criar momento";

require_once "inc/views/header.php";
require_once "inc/views/navbar.php";
?>
<div class="container mt-3 pb-5">
  <div class="row">
    <div class="col-12">
      <div class="card card-form">
        <div class="card-body">
          <h2><?php echo $page_title; ?></h2>
          <form class="mt-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
              <input type="text" name="moment_label" class="form-control <?php echo (!empty($label_err)) ? 'is-invalid' : ''; ?>" placeholder="Nome" value="<?php echo (isset($moment_label)) ? $moment_label : ''; ?>">
              <span class="invalid-feedback"><?php echo $label_err; ?></span>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="moment_description" rows="4" placeholder="Descrição"><?php echo (isset($moment_description)) ? $moment_description : ''; ?></textarea>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="moment_attachments" rows="5" placeholder="Imagens (separe os links por virgula)"><?php echo (isset($moment_attachments)) ? $moment_attachments : ''; ?></textarea>
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
              <button type="submit" name="btn-create-moment" class="btn btn-create btn-block">Criar momento</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "inc/views/footer.php"; ?>