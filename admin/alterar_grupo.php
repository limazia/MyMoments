<?php
	require_once './inc/controller/grupo/alterar_grupo.php';	
	if(isset($_GET['id'])){
	   $product = new produto();
	   $product->setId($_GET['id']);
	   $resp=$product->buscarId();
	   ?>
<h3>Alterar Produto</h3>
<form action="alterar2_grupo.php" method="POST">
    <p>Id: <input type="number" value="<?php echo $resp['id']?>" name="id" readonly="true"></p>
    <p>Nome: <input type="text" value="<?php echo $resp['nome']?>" name="nome" required></p>
    <p><input type="submit" value="Alterar"></p>
</form>
<?php
	}
?>