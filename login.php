<?php
require_once "inc/config.php";
require_once "inc/controller/login.php";

$page_title = "Login";

require_once "inc/views/header.php";
?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Login</h2>
                    <p>Inicie uma sessão para continuar</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?php echo (isset($email)) ? $email : ''; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Senha">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
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
                            <button type="submit" name="btn-login" class="btn btn-login btn-block">Entrar</button>
                        </div>
                        <p>Não tem uma conta? <a href="register.php">Crie uma agora</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "inc/views/footer.php"; ?>