<?php 
  class Database {
    private $host = 'localhost';
    private $db_name = 'teachme';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8', $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }
  // $conn = mysqli_connect('localhost', 'root', '', 'teachme');
  // $password = password_hash('tonmoy', PASSWORD_DEFAULT);
  // $createdAt = date('Y-m-d H:i:s', time());
  // $lastUpdated = date('Y-m-d H:i:s', time());
  // $sql = "INSERT INTO `users`(`firstName`, `lastName`, `username`, `phone`, `password`, `createdAt`, `lastUpdated`) VALUES('Al-Shahriar', 'Tonmoy', 'tonmoy', '+8801779716903', '$password', '$createdAt', '$lastUpdated');";
  // mysqli_query($conn, $sql);
?>