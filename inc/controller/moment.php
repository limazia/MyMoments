<?php
require_once __DIR__ . '../../model/moment.php';

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
    $moment->setId(createId(30));
    $moment->setLabel($moment_label);
    $moment->setDescription($moment_description);
    $moment->setAttachments($moment_attachments);
    $moment->setUserId($_SESSION["uid"]);
    $resp = $moment->create();

    if ($resp) {
      unset($_POST);
      echo "<script>alert('Momento criado com sucesso!');</script>";
      echo "<script>location.href = '" . $config->url . "/';</script>";
    } else {
      $errorType = "warning";
      $errorMSG = "Erro no servidor.";
    }
  }
}

if (isset($_POST["btn-update-moment"])) {
  $moment = new Moment();

  $moment_id = trim($_POST['moment_id']);
  $moment_id = strip_tags($moment_id);
  $moment_id = htmlspecialchars($moment_id);

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
    $moment->setId($moment_id);
    $moment->setLabel($moment_label);
    $moment->setDescription($moment_description);
    $moment->setAttachments($moment_attachments);
    $resp = $moment->update();

    if ($resp) {
      unset($_POST);
      echo "<script>alert('Momento alterado com sucesso!');</script>";
      echo "<script>location.href = '" . $config->url . "/';</script>";
    } else {
      $errorType = "warning";
      $errorMSG = "Erro no servidor.";
    }
  }
}