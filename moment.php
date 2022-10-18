<?php
require_once "inc/config.php";
require_once "inc/controller/session.php";
require_once "inc/model/moment.php";

$moment = new Moment();

if (isset($_GET['moment_id'])) {
  $moment->setId($_GET['moment_id']);

  $read = $moment->getMomentById();
  $moment_row = $read->fetch();
  $moment_count = $read->rowCount();

  if ($moment_count == 0 OR $moment_row["id_user"] != $_SESSION["uid"]) {
    echo "<script>alert('Esse momento não existe');</script>";
    echo "<script>location.href = '" . $config->url . "/';</script>";
  }

  $page_title = $moment_row['moment_label'];
}

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
              <h2 style="width: 500px;"><?php echo $moment_row["moment_label"]; ?></h2>
              <p class="text-muted" style="width: 500px;">
                <?php if ($moment_row['moment_description'] <> "") { ?>
                  <?php echo $moment_row['moment_description']; ?>
                <?php } else { ?>
                  Sem descrição
                <?php } ?>
              </p>
            </div>
            <a href="../update/<?php echo $_GET['moment_id']; ?>">Editar momento</a>
          </div>
          <div class="row">
            <?php if ($moment_row['attachments'] <> "") { ?>
              <?php
              $images = explode(',', $moment_row['attachments']);
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