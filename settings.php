<?php
require_once "inc/config.php";
require_once "inc/controller/session.php";

$page_title = "Minha conta";

$date = date_create($strow["created_at"]);

require_once "inc/views/header.php";
require_once "inc/views/navbar.php";
?>
<div class="container">
  <div class="row d-flex justify-content-center align-items-center mt-5">
    <div class="col-xs-12 col-md-6">
      <div class="card card-settings card-form mb-5">
        <div class="card-body">
          <h5 class="card-title">Minha conta</h5>
          <div class="row">
            <div class="col-md-12">
              <div class="input-editable">
                <span>Nome</span>
                <p>
                  <?php echo $strow["name"]; ?>
                  <a href="#" class="btn btn-link">
                    Editar
                  </a>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="input-editable">
                <span>Email</span>
                <p>
                  <?php echo $strow["email"]; ?>
                  <a href="#" class="btn btn-link">
                    Editar
                  </a>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="input-editable">
                <span>Senha</span>
                <p>
                  ***********
                  <a href="#" class="btn btn-link">
                    Alterar
                  </a>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <small class="text-muted">
                Registrado em: <?php echo date_format($date, "d/m/Y"); ?>
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "inc/views/footer.php"; ?>