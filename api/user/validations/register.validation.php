<?php
  // Validations
  $validator = new Validator($_POST);

  $validator
    ->required('First name is required')
    ->maxlength(20, 'First name may have at most 20 chars')
    ->validate('firstName');

  $validator
    ->required('Last name is required')
    ->maxlength(20, 'Last name may have at most 20 chars')
    ->validate('lastName');

  $validator
    ->required('Username is required')
    ->minlength(3, 'Username should have at least 3 chars')
    ->maxlength(12, 'Username may have at most 12 chars')
    ->callback(function($username){
      return preg_match("/^[a-zA-Z0-9_]+$/", $username) ? true : false;
    }, 'Username may contain only alphabets, digits and underscores')
    ->validate('username');

  if(!is_null($users->email)) {
    $validator
      ->email('Invalid email address')
      ->callback(function($email){
        global $users;
        return !$users->readByEmail() ? true : false;
      }, 'Email is already used')
      ->validate('email');
  }

  $validator
    ->required('Password is required')
    ->minlength(8, 'Password should have at least 8 chars')
    ->maxlength(20, 'Password may have at most 20 chars')
    ->callback(function($password){
      return preg_match("/^[a-zA-Z0-9]+$/", $password) ? true : false;
    }, 'Password may contain only alphabets and digits')
    ->validate('password');

  $validator
    ->required('Phone number is required')
    ->callback(function($phone){
      return preg_match("/\+8801[3456789]{1}[0-9]{8}$/", $phone) ? true : false;
    }, 'Invalid phone number')
    ->callback(function($phone){
      global $users;
      return !$users->readByPhone() ? true : false;
    }, 'Phone number is already used')
    ->validate('phone');
?>