<?php
	

	class produto{
		private $id;
		private $nome;
		private $preco;
		private $descricao;
		private $id_grupo;
		private $img;
	
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
		public function setPreco($preco){
			$this->preco=$preco;
		}
		public function getPreco(){
			return $this->preco;
		}
		public function setDescricao($descricao){
			$this->descricao=$descricao;
		}
		public function getDescricao(){
			return $this->descricao;
		}

		public function setId_grupo($id_grupo){
			$this->id_grupo=$id_grupo;
		}
		public function getId_grupo(){
			return $this->id_grupo;
		}

		public function setImg($img){
			$this->img=$img;
		}
		
		public function getImg(){
			return $this->img;
		}

		public function imprime(){
			echo "id=".$this->id."<br>";
			echo "nome=".$this->nome."<br>";
			echo "preco=".$this->preco."<br>";
			echo "descricao=".$this->descricao."<br>";
			echo "Grupo=".$this->id_grupo."<br>";
		}

		public function inserir(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"insert into produto(nome,preco,descricao) ".
			"values(:n,:p,:d)");
			$st->bindValue(":n",$this->getNome());
			$st->bindValue(":p",$this->getPreco());
			$st->bindValue(":d",$this->getDescricao());
			return $st->execute();	
		}

		public function alterar(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"update produto set nome=:n,preco=:p,".
			"descricao=:d where id=:id");
			$st->bindValue(":id",$this->getId());
			$st->bindValue(":n",$this->getNome());
			$st->bindValue(":p",$this->getPreco());
			$st->bindValue(":d",$this->getDescricao());
			return $st->execute();	
		}
		public function apagar(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"delete from produto where id=:id");
			$st->bindValue(":id",$this->getId());
			return $st->execute();	
		}
		public function buscarTodos(){
			$pdo= new conexao();
			$st=$pdo->conn->prepare(
			"select * from produto order by nome");
			$st->execute();	
			return $st->fetchAll();
		}	
		public function buscarId(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"select * from produto where id=:id");
			$st->bindValue(":id",$this->getId());
			$st->execute();	
			return $st->fetch();
		}

		public function alteraGrupo(){
			$pdo = new conexao();
			$st=$pdo->conn->prepare(
			"update produto set id_grupo =:id_grupo where id=:id");
			$st->bindValue(":id_grupo", $this->getId_grupo());
			$st->bindValue(":id", $this->getId());
		}	
	}
?>