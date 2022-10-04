<?php
session_start();

if (isset($_SESSION['uid']) != "") {
    $pdo = new Connection();

    $st = $pdo->conn->prepare("SELECT * FROM users WHERE id = :id");
    $st->bindValue(":id", $_SESSION['uid']);
    $st->execute();
    $strow = $st->fetch();

    if ($st->rowCount() == 0) {
        echo "<script>window.location='" . $config->url . "/logout.php?logout'; </script>";
    }
}

if (isset($_SESSION['uid']) == "") {
    header("Location: " . $config->url . "/login.php");
    exit;
}