<?php
   
class User extends Connection {
     private $id;
     private $name;
     private $email;
     private $password;

     public function setId($id){
          $this->id = $id;
     }

     public function getId(){
          return $this->id;
     }

     public function setName($name){
          $this->name = $name;
     }

     public function getName(){
          return $this->name;
     }

     public function setEmail($email){
          $this->email = $email;
     }

     public function getEmail(){
          return $this->email;
     }

     public function setPassword($password){
          $this->password = $password;
     }

     public function getPassword(){
          return $this->password;
     }

     public function read(){
          echo "id=" . $this->id . "<br>";
          echo "name=" . $this->name . "<br>";
          echo "email=" . $this->email . "<br>";
          echo "password=" . $this->password . "<br>";
     }

     public function create(){
          $pdo = new Connection();

          $st = $pdo->conn->prepare("
               INSERT INTO users (id, name, email, password) 
               VALUES (:id, :name, :email, :password)"
          );
          $st->bindValue(":id", $this->getId());
          $st->bindValue(":name", $this->getName());
          $st->bindValue(":email", $this->getEmail());
          $st->bindValue(":password", $this->getPassword());

          return $st->execute();
     }

     public function update(){
          $pdo = new Connection();

          $st = $pdo->conn->prepare("
               UPDATE users 
               SET name = :name, emaiL = :email, password = :password 
               WHERE id=:id"
          );
          $st->bindValue(":id", $this->getId());
          $st->bindValue(":name", $this->getName());
          $st->bindValue(":email", $this->getEmail());
          $st->bindValue(":password", $this->getPassword());
          $st->execute();

          return $st->execute();
     }

     public function delete(){
          $pdo = new Connection();
          
          $st = $pdo->conn->prepare("DELETE FROM users WHERE id = :id");
          $st->bindValue(":id", $this->getId());

          return $st->execute();
     }

     public function getUserByEmail(){
          $pdo = new Connection();

          $st = $pdo->conn->prepare("SELECT * FROM users WHERE email = :email");
          $st->bindValue(":email", $this->getEmail());
          $st->execute();
          
          return $st;
     }
}
