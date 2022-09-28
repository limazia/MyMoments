<?php
session_start();

require_once __DIR__ . '../../model/user.php';
require_once __DIR__ . "../../functions/id.php";

// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if (isset($_SESSION['uid']) != "") {
  header("Location: " . $config->urlLocal . "/");
  exit;
}

$error = false;

//Verifica o pressionamento da tecla entrar da tela login.
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
  $check_email = $user->emailExists();

  if (empty($name)) {
    $error = true;
    $name_err = "Digite um nome";
  }

  if (empty($email)) {
    $error = true;
    $email_err = "Digite um email";
  } else if ($check_email > 0) {
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
  }

  if (!$error && $password === $confirm_password) {
    $password_hash = hash('sha256', $password);

    $user->setId(random_id(10));
    $user->setName($name);
    $user->setPassword($password_hash);
    $resp = $user->create();

    if ($resp) {
      unset($_POST);
      echo "<script>alert('Conta criada com sucesso!');</script>";
      echo "<script>location.href = '" . $config->urlLocal . "/login.php';</script>";
    } else {
      $errorType = "warning";
      $errorMSG = "Erro no servidor.";
    }
  }
}
