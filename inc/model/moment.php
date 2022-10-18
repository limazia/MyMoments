<?php
class Moment extends Connection {
	private $id;
	private $label;
	private $description;
	private $attachment;
	private $user_id;
	private $attachment_id;
	private $attachments;

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

	public function setAttachment($attachment){
		$this->attachment = $attachment;
	}

	public function getAttachment(){
		return $this->attachment;
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}

	public function getUserId(){
		return $this->user_id;
	}

	public function setAttachmentId($attachment_id){
		$this->attachment_id = $attachment_id;
	}

	public function getAttachmentId(){
		return $this->attachment_id;
	}

	public function setAttachments($attachments){
		$this->attachments = $attachments;
	}

	public function getAttachments(){
		return $this->attachments;
	}

	public function read(){
		echo "id=" . $this->id . "<br>";
		echo "label=" . $this->label . "<br>";
		echo "description=" . $this->description . "<br>";
		echo "id_attachment=" . $this->attachment . "<br>";
		echo "id_user=" . $this->user_id . "<br>";
		echo "attachment_id=" . $this->attachment_id . "<br>";
		echo "attachments=" . $this->attachments . "<br>";
	}

	public function create(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			INSERT INTO attachments (attachment_id, attachments) 
				VALUES (:attachment_id, :attachments);
			INSERT INTO moments (moment_id, moment_label, moment_description, id_attachment, id_user) 
				VALUES (:id, :label, :description, :attachment, :user_id);
		");

		$st->bindValue(":id", $this->getId());
		$st->bindValue(":label", $this->getLabel());
		$st->bindValue(":description", $this->getDescription());
		$st->bindValue(":attachment", $this->getAttachment());
		$st->bindValue(":user_id", $this->getUserId());

		$st->bindValue(":attachment_id", $this->getAttachmentId());
		$st->bindValue(":attachments", $this->getAttachments());

		return $st->execute();
	}

	public function update(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			UPDATE moments 
			SET moment_label = :label, moment_description = :description
			WHERE moment_id = :id;
			UPDATE attachments 
			SET attachments = :attachments 
			WHERE attachment_id = :attachment_id
		");

		$st->bindValue(":id", $this->getId());
		$st->bindValue(":label", $this->getLabel());
		$st->bindValue(":description", $this->getDescription());

		$st->bindValue(":attachment_id", $this->getAttachmentId());
		$st->bindValue(":attachments", $this->getAttachments());

		return $st->execute();
	}

	public function delete(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			DELETE FROM moments WHERE moment_id = :id;
			DELETE FROM attachments WHERE attachment_id = :attachment_id;
		");
		$st->bindValue(":id", $this->getId());
		$st->bindValue(":attachment_id", $this->getAttachmentId());

		return $st->execute();
	}

	public function listAll(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			SELECT * FROM users u 
			INNER JOIN moments m 
			ON u.id = m.id_user
			INNER JOIN attachments a 
			ON m.id_attachment = a.attachment_id
			WHERE u.id = :id
			ORDER BY m.created_at DESC");
		$st->bindValue(":id", $_SESSION['uid']);
		$st->execute();

		return $st;
	}

	public function getMomentById(){
		$pdo = new Connection();

		$st = $pdo->conn->prepare("
			SELECT * FROM users u 
			INNER JOIN moments m 
			ON u.id = m.id_user
			INNER JOIN attachments a 
			ON m.id_attachment = a.attachment_id
			WHERE m.moment_id = :id
			ORDER BY m.created_at DESC");
		$st->bindValue(":id", $this->getId());
		$st->execute();

		return $st;
	}
}
