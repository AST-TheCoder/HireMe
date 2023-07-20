<?php
  header('Content-type: application/json');

  session_start();
  include_once '../../config/Timezone.php';
  include_once '../../config/Constants.php';
  include_once '../../config/Database.php';
  include_once '../../models/Users.php';

  extract($_POST);

  if(!isset($phone) || !isset($password)) {
    http_response_code(400);
    echo json_encode(['message' => 'Something Went Wrong. Try again, please.']);
    exit();
  }

  $database = new Database();
  $db = $database->connect();

  $users = new Users($db);

  $users->phone = trim($phone);
  $users->password = trim($password);

  $matchedRow = $users->readByPhone();

  if(!$matchedRow || !password_verify($users->password, $matchedRow['password'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid phone or password', 'data' => $matchedRow]);
    exit();
  }

  $_SESSION['user']['id'] = $matchedRow['id'];

  http_response_code(200);
  echo json_encode(['redirectUrl' => ROOT]);
?>