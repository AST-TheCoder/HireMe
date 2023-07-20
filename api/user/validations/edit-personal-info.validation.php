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

  if(!is_null($users->email)) {
    $validator
      ->email('Invalid email address')
      ->callback(function($email){
        global $users;
        return !$users->readByEmailOfOthers() ? true : false;
      }, 'Email is already used by someone')
      ->validate('email');
  }

  $validator
    ->required('Phone number is required')
    ->callback(function($phone){
      return preg_match("/\+8801[3456789]{1}[0-9]{8}$/", $phone) ? true : false;
    }, 'Invalid phone number')
    ->callback(function($phone){
      global $users;
      return !$users->readByPhoneOfOthers() ? true : false;
    }, 'Phone number is already used by someone')
    ->validate('phone');

  if(!is_null($users->description)) {
    $validator
    ->maxlength(1000, 'Description name may have at most 1000 chars')
    ->validate('description');
  }
?>