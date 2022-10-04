<?php
class Moment extends Connection {
	private $id;
	private $label;
	private $description;
	private $attachments;
	private $user_id;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setLabel($label){
		$this->label = $label;
	}

	public function getLabel(){
		return $this->label;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setAttachments($attachments){
		$this->attachments = $attachments;
	}

	public function getAttachments(){
		return $this->attachments;
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}

	public function getUserId(){
		return $this->user_id;
	}

	public function read(){
		echo "moment_id=" . $this->moment_id . "<br>";
		echo "moment_label=" . $this->moment_label . "<br>";
		echo "moment_description=" . $this->moment_description . "<br>";
		echo "moment_attachments=" . $this->moment_attachments . "<br>";
		echo "user_id=" . $this->id_user_id . "<br>";
	}

	public function create(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			INSERT INTO moments (moment_id, moment_label, moment_description, moment_attachments, user_id) 
			VALUES (:id, :label, :description, :attachments, :user_id)
		");

		$st->bindValue(":id", $this->getId());
		$st->bindValue(":label", $this->getLabel());
		$st->bindValue(":description", $this->getDescription());
		$st->bindValue(":attachments", $this->getAttachments());
		$st->bindValue(":user_id", $this->getUserId());

		return $st->execute();
	}

	public function update(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			UPDATE moments 
			SET moment_label = :label, moment_description = :description, moment_attachments = :attachments 
			WHERE moment_id = :id
		");

		$st->bindValue(":id", $this->getId());
		$st->bindValue(":label", $this->getLabel());
		$st->bindValue(":description", $this->getDescription());
		$st->bindValue(":attachments", $this->getAttachments());

		return $st->execute();
	}

	public function delete(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("DELETE FROM moments WHERE moment_id = :id");
		$st->bindValue(":id", $this->getId());

		return $st->execute();
	}

	public function listAll(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			SELECT * FROM users u 
			RIGHT JOIN moments m 
			ON u.id = m.user_id
			ORDER BY m.created_at DESC");
		$st->execute();

		return $st;
	}

	public function getMomentById(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("SELECT * FROM moments where moment_id = :id");
		$st->bindValue(":id", $this->getId());
		$st->execute();

		return $st;
	}
}
