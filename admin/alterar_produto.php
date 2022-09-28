<?php
    require_once './inc/config.php';
	require_once '../inc/class/produto.php';	
	if(isset($_GET['id'])){
	   $product = new produto();
	   $product->setId($_GET['id']);
	   $resp=$product->buscarId();
	   ?>
<h3>Alterar Produto</h3>
<form action="../inc/controller/alterar_produto.php" method="POST">
    <p>Id: <input type="number" value="<?php echo $resp['id']?>" name="id" readonly="true"></p>
    <p>Nome: <input type="text" value="<?php echo $resp['nome']?>" name="nome" required></p>
    <p>Valor: <input type="number" value="<?php echo $resp['valor']?>" name="valor"></p>
    <p>Descricao: <input type="text" value="<?php echo $resp['descricao']?>" name="descricao"></p>
    <p><input type="submit" value="Alterar"></p>
</form>
<?php
	}
?>