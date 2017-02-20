<?php

function check_empty_fields($required_fields_array){

  $form_errors = array();

  foreach($required_fields_array as $name_of_fields){
    if(!isset($_POST[$name_of_fields]) || $_POST[$name_of_fields] == null){

        $form_errors[] = $name_of_fields . "is a required field";
    }
  }
  return $form_errors;
}


function check_min_length($fields_to_check_lenght){

  $form_errors = array();

  foreach ($fields_to_check_lenght as $name_of_field => $minimum_length_required){

      if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required){
          $form_errors[] = $name_of_field . "is too short, must atleast be {$minimum_length_required} char long";

      }

  }
  return $form_errors;

}


function check_email($data){

  $form_errors = array();

  $key = 'email';

  if(array_key_exists($key,$data)){

      if($_POST[$key] != null){

          $key = filer_var($key, FILTER_SANITIZE_EMAIL);

          if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){

              $form_errors[] = $key . "is not a valid email address";
          }
      }
  }
  return $form_errors;

}



function display_errors($form_errors_array){

    $errors = "<p><ul style='color: red'>";
    foreach($form_errors_array as $error){

        $errors .= "<li> {$error} </li>";

    }
    $errors .= "</ul></p>";
    return $errors;

}
