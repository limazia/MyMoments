<?php
require_once "inc/config.php";
require_once "inc/controller/register.php";

$page_title = "Criar conta";

require_once "inc/views/header.php";
?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Registro</h2>
                    <p>Crie uma conta gratuitamente</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" placeholder="Nome completo" value="<?php echo (isset($name)) ? $name : ''; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?php echo (isset($email)) ? $email : ''; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Senha" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" placeholder="Confirme a senha" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <?php if (isset($errorMSG)) { ?>
                            <div class="alert alert-<?php echo ($errorType == "success") ? "success" : $errorType; ?>">
                                <h6 class="text-<?php echo ($errorType == "success") ? "success" : $errorType; ?>">
                                    <?php echo $errorMSG; ?></h6>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <button type="submit" name="btn-register" class="btn btn-register btn-block">Criar conta</button>
                        </div>
                        <p>Já tem conta? <a href="login.php">Faça login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "inc/views/footer.php"; ?>