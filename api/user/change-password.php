<?php
  header('Content-type: application/json');

  session_start();
  include_once '../../config/Timezone.php';
  include_once '../../config/Constants.php';
  include_once '../../config/Database.php';
  include_once '../../models/Validator.php';
  include_once '../../models/Users.php';

  extract($_POST);
  
  if(!isset($_SESSION['user']['id']) || !isset($currentPassword) || !isset($newPassword) || !isset($confirmPassword)){
    http_response_code(400);
    echo json_encode(['message' => 'Something went wrong. Please, try again.']);
  }

  $database = new Database();
  $db = $database->connect();

  $users = new Users($db);
  $users->id = $_SESSION['user']['id'];

  include_once 'validations/change-password.validation.php';

  if($validator->hasErrors()) {
    http_response_code(400);
    echo json_encode(['message' => $validator->getAllErrors()[array_key_first($validator->getAllErrors())]]);
    exit();
  }

  $users->password = password_hash($newPassword, PASSWORD_DEFAULT);

  if(!$users->updatePassword()) {
    http_response_code(503);
    echo json_encode(['message' => 'Server error. Please, try again later.']);
    exit();
  }

  http_response_code(200);
  echo json_encode(['message' => 'Password successfully changed']);
?>