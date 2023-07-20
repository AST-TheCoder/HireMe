<?php
  header('Content-type: application/json');

  session_start();
  include_once '../../config/Timezone.php';
  include_once '../../config/Constants.php';
  include_once '../../config/Database.php';
  include_once '../../models/Validator.php';
  include_once '../../models/Users.php';

  extract($_POST);

  if(!isset($firstName) || !isset($lastName) || !isset($username) || !isset($email) || !isset($password) || !isset($phone)) {
    http_response_code(400);
    echo json_encode(['message' => 'Something Went Wrong. Try again, please.']);
    exit();
  }

  $database = new Database();
  $db = $database->connect();

  $users = new Users($db);

  $users->firstName = trim($firstName);
  $users->lastName = trim($lastName);
  $users->username = trim($username);
  $users->email = !empty(trim($email)) ? trim($email) : null;
  $users->password = trim($password);
  $users->phone = trim($phone);

  include_once 'validations/register.validation.php';

  if($validator->hasErrors()) {
    http_response_code(400);
    echo json_encode(['message' => $validator->getAllErrors()[array_key_first($validator->getAllErrors())]]);
    exit();
  }

  $users->password = password_hash($users->password, PASSWORD_DEFAULT);

  if(!$users->create()) {
    http_response_code(503);
    echo json_encode(['message' => 'Server error. Please, try again later.']);
    exit();
  }

  $_SESSION['user']['id'] = $db->lastInsertId();

  http_response_code(200);
  echo json_encode(['redirectUrl' => ROOT]);
?>