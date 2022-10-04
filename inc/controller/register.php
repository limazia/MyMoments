<?php
session_start();

require_once __DIR__ . '../../model/user.php';

if (isset($_SESSION['uid']) != "") {
  header("Location: " . $config->url . "/");
  exit;
}

$error = false;

if (isset($_POST["btn-register"])) {
  $user = new User();

  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);

  $confirm_password = trim($_POST['confirm_password']);
  $confirm_password = strip_tags($confirm_password);
  $confirm_password = htmlspecialchars($confirm_password);

  $user->setEmail($email);
  $check_email = $user->getUserByEmail();
  $email_count = $check_email->rowCount();

  if (empty($name)) {
    $error = true;
    $name_err = "Digite um nome";
  }

  if (empty($email)) {
    $error = true;
    $email_err = "Digite um email";
  } else if ($email_count > 0) {
    $error = true;
    $email_err = "Email já registrado";
  }

  if (empty($password)) {
    $error = true;
    $password_err = "Digite uma senha";
  } else if (strlen($password) < 6) {
    $error = true;
    $password_err = "A senha deve ter pelo menos 6 caracteres.";
  }

  if (empty($confirm_password)) {
    $error = true;
    $confirm_password_err = "Digite uma confirmação de senha";
  } else if ($password <> $confirm_password) {
    $error = true;
    $confirm_password_err = "Senhas não coincidem";
    $password_err = "Senhas não coincidem";
  } else if (strlen($confirm_password) < 6) {
    $error = true;
    $confirm_password_err = "A senha deve ter pelo menos 6 caracteres";
  }

  if (!$error && $password === $confirm_password) {
    $password_hash = hash('sha256', $password);

    $id = createId(10);

    $user->setId($id);
    $user->setName($name);
    $user->setPassword($password_hash);
    $resp = $user->create();

    if ($resp) {
      $_SESSION['loggedin'] = true;
      $_SESSION['uid'] = $id;

      unset($_POST);
      echo "<script>alert('Conta criada com sucesso');</script>";
      echo "<script>location.href = '" . $config->url . "/';</script>";
    } else {
      $errorType = "warning";
      $errorMSG = "Erro no servidor";
    }
  }
}
