<?php
    require_once 'user.php';
    if(isset($_POST['username'])){
        $user = new user();
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        if($user-inserir()){
            ?>
        
            <script>
                alert("Registro de conta realizado com sucesso!")
                location.href = "../produto/index.php"
            </script>
        <?php
                }else{
                    ?>
                    <script>
                        alert("Erro ao registrar conta!")
                        location.href= "../produto/index.php"
                    </script>    
                }
        
    }