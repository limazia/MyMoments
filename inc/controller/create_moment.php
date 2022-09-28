<?php
require_once __DIR__ . '../../model/moment.php';
require_once __DIR__ . "../../functions/id.php";

$error = false;

if (isset($_POST["btn-create-moment"])) {
  $moment = new Moment();

  $moment_label = trim($_POST['moment_label']);
  $moment_label = strip_tags($moment_label);
  $moment_label = htmlspecialchars($moment_label);

  $moment_description = trim($_POST['moment_description']);
  $moment_description = strip_tags($moment_description);
  $moment_description = htmlspecialchars($moment_description);

  $moment_attachments = trim($_POST['moment_attachments']);
  $moment_attachments = strip_tags($moment_attachments);
  $moment_attachments = htmlspecialchars($moment_attachments);

  if (empty($moment_label)) {
    $error = true;
    $label_err = "Digite um nome";
  }

  if (!$error) {
    $moment->setId(random_id(30));
    $moment->setLabel($moment_label);
    $moment->setDescription($moment_description);
    $moment->setAttachments($moment_attachments);
    $moment->setUserId($_SESSION["uid"]);
    $resp = $moment->create();

    if ($resp) {
      unset($_POST);
      echo "<script>alert('Momento criado com sucesso!');</script>";
      echo "<script>location.href = '" . $config->urlLocal . "/';</script>";
    } else {
      $errorType = "warning";
      $errorMSG = "Erro no servidor.";
    }
  }
}
