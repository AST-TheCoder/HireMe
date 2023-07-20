<?php
  header('Content-type: application/json');

  session_start();
  include_once '../../config/Timezone.php';
  include_once '../../config/Constants.php';
  include_once '../../config/Database.php';
  include_once '../../models/Users.php';

  extract($_POST);

  if(!isset($_SESSION['user']['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Something Went Wrong. Try again, please.']);
    exit();
  }

  $database = new Database();
  $db = $database->connect();

  $users = new Users($db);

  $users->id = $_SESSION['user']['id'];

  $singleUser = $users->readById();

  if(!$singleUser) {
    http_response_code(400);
    echo json_encode(['message' => 'Something Went Wrong. Try again, please.']);
    exit();
  }

  http_response_code(200);
  echo json_encode(['user' => [
    'firstName' => $singleUser['firstName'],
    'lastName' => $singleUser['lastName'],
    'username' => $singleUser['username'],
    'email' => is_null($singleUser['email']) ? '' : $singleUser['email'],
    'phone' => $singleUser['phone'],
    'description' => is_null($singleUser['description']) ? '' : $singleUser['description']
  ]]);
?>