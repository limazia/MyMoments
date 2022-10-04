<?php
require_once "inc/config.php";
require_once "inc/controller/session.php";

$page_title = "Minha conta";

require_once "inc/views/header.php";
require_once "inc/views/navbar.php";
?>
<div class="container mt-5 pb-5">
  <div class="row">
    <div class="col-12">
      <div class="card card-form">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h2><?php echo $moment_row["moment_label"]; ?></h2>
              <p class="text-muted"><?php if ($moment_row['moment_description'] <> "") { ?>
                  <?php echo $moment_row['moment_description']; ?>
                <?php } else { ?>
                  Sem descrição
                <?php } ?></p>
            </div>
            <a href="../update/<?php echo $_GET['moment_id']; ?>">Editar momento</a>
          </div>
          <div class="row">
            <?php if ($moment_row['moment_attachments'] <> "") { ?>
              <?php
              $images = explode(',', $moment_row['moment_attachments']);
              foreach ($images as $index => $image) {
              ?>
                <div class="col-md-4">
                  <div class="card card-moment-image">
                    <img class="card-img-top" src="<?php echo $image; ?>">
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "inc/views/footer.php"; ?>