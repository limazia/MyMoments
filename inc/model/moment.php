<?php
class Moment {
	private $moment_id;
	private $moment_label;
	private $moment_description;
	private $moment_attachments;
	private $user_id;

	public function setId($moment_id){
		$this->moment_id = $moment_id;
	}

	public function getId(){
		return $this->moment_id;
	}

	public function setLabel($moment_label){
		$this->moment_label = $moment_label;
	}

	public function getLabel(){
		return $this->moment_label;
	}

	public function setDescription($moment_description){
		$this->moment_description = $moment_description;
	}

	public function getDescription(){
		return $this->moment_description;
	}

	public function setAttachments($moment_attachments){
		$this->moment_attachments = $moment_attachments;
	}

	public function getAttachments(){
		return $this->moment_attachments;
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
			VALUES (:moment_id, :moment_label, :moment_description, :moment_attachments, :user_id)
		");

		$st->bindValue(":moment_id", $this->getId());
		$st->bindValue(":moment_label", $this->getLabel());
		$st->bindValue(":moment_description", $this->getDescription());
		$st->bindValue(":moment_attachments", $this->getAttachments());
		$st->bindValue(":user_id", $this->getUserId());

		return $st->execute();
	}

	public function update(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			UPDATE moments 
			SET moment_label = :moment_label, moment_description = :moment_description, moment_attachments = :moment_attachments 
			WHERE moment_id = :moment_id
		");

		$st->bindValue(":moment_id", $this->getId());
		$st->bindValue(":moment_label", $this->getLabel());
		$st->bindValue(":moment_description", $this->getDescription());
		$st->bindValue(":moment_attachments", $this->getAttachments());

		return $st->execute();
	}

	public function delete(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("DELETE FROM moments WHERE moment_id = :moment_id");
		$st->bindValue(":moment_id", $this->getId());

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

		$st = $pdo->conn->prepare("SELECT * FROM moments where moment_id = :moment_id");
		$st->bindValue(":moment_id", $this->getId());
		$st->execute();

		return $st;
	}
}
