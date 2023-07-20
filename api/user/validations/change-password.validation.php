<?php
  // Validations
  $validator = new Validator($_POST);

  $validator
    ->required('Current password is required')
    ->callback(function($password){
      global $users;
      $singleUser = $users->readById();
      return $singleUser && password_verify($password, $singleUser['password']) ? true : false;
    }, 'Invalid current password')
    ->validate('currentPassword');

  $validator
    ->required('New Password is required')
    ->minlength(8, 'New Password should have at least 8 chars')
    ->maxlength(20, 'New Password may have at most 20 chars')
    ->callback(function($password){
      return preg_match("/^[a-zA-Z0-9]+$/", $password) ? true : false;
    }, 'New Password may contain only alphabets and digits')
    ->validate('newPassword');

  $validator
    ->required('Confirm Password is required')
    ->minlength(8, 'Confirm Password should have at least 8 chars')
    ->maxlength(20, 'Confirm Password may have at most 20 chars')
    ->callback(function($password){
      return preg_match("/^[a-zA-Z0-9]+$/", $password) ? true : false;
    }, 'Confirm Password may contain only alphabets and digits')
    ->matches('newPassword', 'Password matching', 'Passwords don\'t match')
    ->validate('confirmPassword');
?>