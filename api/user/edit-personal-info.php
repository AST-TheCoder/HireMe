<?php
  header('Content-type: application/json');

  session_start();
  include_once '../../config/Timezone.php';
  include_once '../../config/Constants.php';
  include_once '../../config/Database.php';
  include_once '../../models/Validator.php';
  include_once '../../models/Users.php';

  extract($_POST);

  if(!isset($_SESSION['user']['id']) || !isset($firstName) || !isset($lastName) || !isset($email) || !isset($phone) || !isset($description)) {
    http_response_code(400);
    echo json_encode(['message' => 'Something Went Wrong. Try again, please.']);
    exit();
  }

  $database = new Database();
  $db = $database->connect();

  $users = new Users($db);

  $users->id = $_SESSION['user']['id'];
  $users->firstName = trim($firstName);
  $users->lastName = trim($lastName);
  $users->email = !empty(trim($email)) ? trim($email) : null;
  $users->phone = trim($phone);
  $users->description = !empty(trim($description)) ? trim($description) : null;

  include_once 'validations/edit-personal-info.validation.php';

  if($validator->hasErrors()) {
    http_response_code(400);
    echo json_encode(['message' => $validator->getAllErrors()[array_key_first($validator->getAllErrors())]]);
    exit();
  }

  if(!$users->update()) {
    http_response_code(503);
    echo json_encode(['message' => 'Server error. Please, try again later.']);
    exit();
  }

  http_response_code(200);
  echo json_encode(['message' => 'Your info has been successfully updated']);
?>