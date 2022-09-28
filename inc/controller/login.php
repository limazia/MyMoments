<?php
session_start();

require_once __DIR__ . '../../class/user.php';

// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if (isset($_SESSION['uid']) != "") {
  header("Location: " . $config->urlLocal . "/");
  exit;
}

$error = false;

//Verifica o pressionamento da tecla entrar da tela login.
if (isset($_POST["btn-login"])) {
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);

  if (empty($email)) {
    $error = true;
    $email_err = "Digite um email";
  }
  if (empty($password)) {
    $error = true;
    $password_err = "Digite uma senha";
  }

  //se todos os campos estiverem preenchidos  transforma a senha digitada na criptografia sha256
  if (!$error) {
    $password_hash = hash('sha256', $password);

    $user = new User();
    $user->setEmail($email);
    $resp = $user->getUserByEmail();

    $strow = $resp->fetch();
    $stcount = $resp->rowCount();

    //Verifica se o user selecionado condiz com a senha criptografada.
    if ($stcount == 1 && $strow['password'] == $password_hash) {
      $_SESSION['loggedin'] = true;
      $_SESSION['uid'] = $strow['id'];
      unset($_POST);
      header("Location: " . $config->urlLocal . "/");
      exit;
    } else if ($stcount == 0) {
      $errorType = "danger";
      $errorMSG = "O email inserido não pertence a uma conta.";
    } else if ($stcount == 1 && $strow['password'] !== $password_hash) {
      $errorType = "danger";
      $errorMSG = "Senha incorreta.";
    } else {
      $errorType = "warning";
      $errorMSG = "Erro no servidor.";
    }
  }
}
