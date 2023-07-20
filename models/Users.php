<?php
  class Users {
    private $conn;
    private $tableName = 'users';

    public $id;
    public $firstName;
    public $lastName;
    public $username;
    public $email;
    public $phone;
    public $password;
    public $description;
    public $profilePicUrl;
    public $createdAt;
    public $lastUpdated;

    public function __construct($db) {
      $this->conn = $db;
    }

    public function readById() {
      $query = "SELECT * FROM `$this->tableName` WHERE `id` = :id;";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':id', $this->id);

      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readByPhone() {
      $query = "SELECT * FROM `$this->tableName` WHERE `phone` = :phone;";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':phone', $this->phone);

      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readByPhoneOfOthers() {
      $query = "SELECT * FROM `$this->tableName` WHERE `phone` = :phone AND `id` != :id;";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':phone', $this->phone);

      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readByEmail() {
      $query = "SELECT * FROM `$this->tableName` WHERE `email` = :email;";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':email', $this->email);

      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readByEmailOfOthers() {
      $query = "SELECT * FROM `$this->tableName` WHERE `email` = :email AND `id` != :id;";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':email', $this->email);

      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
      $this->createdAt = date('Y-m-d H:i:s');
      $this->lastUpdated = date('Y-m-d H:i:s');

      $query = "INSERT INTO `$this->tableName`(`firstName`, `lastName`, `username`, `email`, `phone`, `password`, `createdAt`, `lastUpdated`) VALUES(:firstName, :lastName, :username, :email, :phone, :password, :createdAt, :lastUpdated);";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':firstName', $this->firstName);
      $stmt->bindParam(':lastName', $this->lastName);
      $stmt->bindParam(':username', $this->username);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':phone', $this->phone);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':createdAt', $this->createdAt);
      $stmt->bindParam(':lastUpdated', $this->lastUpdated);

      if($stmt->execute()) {
        return true;
      }

      return false;
    }

    public function update() {
      $this->lastUpdated = date('Y-m-d H:i:s');

      $query = "UPDATE `$this->tableName` SET `firstName` = :firstName, `lastName` = :lastName, `email` = :email, `phone` = :phone, `description` = :description, `lastUpdated` = :lastUpdated WHERE id = :id;";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':firstName', $this->firstName);
      $stmt->bindParam(':lastName', $this->lastName);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':phone', $this->phone);
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':lastUpdated', $this->lastUpdated);

      if($stmt->execute()) {
        return true;
      }

      return false;
    }
    
    public function updatePassword() {
      $this->lastUpdated = date('Y-m-d H:i:s');

      $query = "UPDATE `$this->tableName` SET `password` = :password, `lastUpdated` = :lastUpdated WHERE `id` = :id;";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':lastUpdated', $this->lastUpdated);

      if($stmt->execute()) {
        return true;
      }

      return false;
    }
  }
?>
