<?php

include_once ("database.php");

function check_empty_fields($required_fields_array){
    $form_errors =array();


    foreach($required_fields_array as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field]==NULL){
            $form_errors[]=$name_of_field;
        }
    }
    return $form_errors;
}


//receive an associative array that contains input name as key and value as min key 
//example password=>6 password should be 6 character or long 
function check_min_length($field_to_check){
    $form_errors =array();

    foreach($field_to_check as $name_of_field => $minimum_length){
        if(strlen(trim($_POST[$name_of_field]))<$minimum_length){
            $form_errors[] = $name_of_field ." is too short must be { $minimum_length } characters long";
        }
    }

    return $form_errors;
}


function check_email($data){
    $form_errors = array();

    $key="email";

    if(array_key_exists($key,$data)){
        if($_POST[$key]!=null){

            //removing all illegal characters 
            $key= filter_var($key,FILTER_SANITIZE_EMAIL);

            //validate email 
            if(filter_var($key,FILTER_VALIDATE_EMAIL)===false){
                $form_errors []=$key ." is not a valid email";
            }
        }
    }

    return $form_errors;
}


function show_error($form_errors_array){
    $errors= "";
    foreach($form_errors_array as $the_error){
        $errors .= $the_error;

    }

    return $errors;
}



function flash_message($message,$passorfail='fail'){
    if($passorfail=='pass'){
        $data ="<p style=color:green;>{$message}</p>";
    }else{
        $data ="<p style=color:red;>{$message}</p>";
    }

    return $data;
}

function check_duplicate($value,$db){
    
    try{
        $sql ="SELECT username FROM users WHERE username=:username";
        $statement = $db->prepare($sql);
        $statement->execute(array(":username"));

        if($row=$statement->fetch()){
            return true;

        }

        return false;

    }catch(PDOException){
        //hande exception

    }
}