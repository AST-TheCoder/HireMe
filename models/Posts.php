<?php
  class Posts {
    private $conn;
    private $tableName = 'posts';

    public $id;
    public $title;
    public $description;
    public $userId;
    public $createdAt;
    public $lastUpdated;

    public function __construct($db) {
      $this->conn = $db;
    }

    public function create() {
      $this->createdAt = date('Y-m-d H:i:s');
      $this->lastUpdated = date('Y-m-d H:i:s');

      $query = "INSERT INTO `$this->tableName`(`title`, `description`, `userId`, `createdAt`, `lastUpdated`) VALUES(:title, :description, :userId, :createdAt, :lastUpdated);";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':userId', $this->userId);
      $stmt->bindParam(':createdAt', $this->createdAt);
      $stmt->bindParam(':lastUpdated', $this->lastUpdated);

      if($stmt->execute()) {
        return true;
      }

      return false;
    }
  }
?>
