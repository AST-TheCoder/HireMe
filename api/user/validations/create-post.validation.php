<?php
  // Validations
  $validator = new Validator($_POST);

  $validator
    ->required('Title is required')
    ->maxlength(200, 'Title may have at most 200 chars')
    ->validate('title');

  $validator
    ->required('Description is required')
    ->maxlength(1000, 'Description should not exceed 1000 chars')
    ->validate('description');
?>