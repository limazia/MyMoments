<?php
	
	class grupo{
		private $id;
		private $nome;
		
		public function setId($id){
			$this->id=$id;
		}
		public function getId(){
			return $this->id;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function getNome(){
			return $this->nome;
		}		
		public function imprime(){
			echo "id=".$this->id."<br>";
			echo "nome=".$this->nome."<br>";
		}
		public function inserir(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"insert into grupo(nome) ".
			"values(:n)");
			$st->bindValue(":n",$this->getNome());
			return $st->execute();	
		}
		public function alterar(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"update grupo set nome=:n where id=:id");
			$st->bindValue(":id",$this->getId());
			$st->bindValue(":n",$this->getNome());
			return $st->execute();	
		}
		public function apagar(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"delete from grupo where id=:id");
			$st->bindValue(":id",$this->getId());
			return $st->execute();	
		}
		public function buscarTodos(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"select * from grupo order by nome");
			$st->execute();	
			return $st->fetchAll();
		}	
		public function buscarId(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"select * from grupo where id=:id");
			$st->bindValue(":id",$this->getId());
			$st->execute();	
			return $st->fetch();
		}

		public function listaGrupo(){
			$pdo = new conexao();			
			$paramtersQty = count($_GET['nome']); //Retorna a quantidade de parâmetros
			$markedPlaceholders = array_fill(0 , $paramtersQty , '?'); //Cria um array com placeholders para a query
			$markedPlaceholders = implode(',' , $markedPlaceholders); //transforma os placeholders em uma única string.
			//cria o statement
			$st = $pdo->conn->prepare("SELECT * FROM grupo WHERE nome (".$markedPlaceholders.");");
			return $st->fetch();			//passa todos os argumentos como parâmetros para a consulta.
			$st->execute($_GET['nome']);
		}

	}
?>