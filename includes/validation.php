<?php

function validateInfo ($id, $name, $type, $value, $points){
    $errors=[];
    $id=(integer)$id;
    $name=(string)$name;
    $type=(string)$type;
    $value=(float)$value;
    $points=(integer)$points;
    if(!$id || $id <= 0){
        $errors[]="Id is invalid";
    }
    if(!$points || $points < 0){
        $errors[]="Points cannot be less than 0 and must be an integer.";
    }
    if(!$value || $value < 0){
        $errors[]="Value cannot be less than 0";
    }
    if(!$name || (strlen($name) < 4 || strlen($name) > 35)) {
        $errors[]="Value must be greater than 4 and less than 35 characters";
    }
    if(!$type || $type != 'Gift Card'){
        $errors[]="Invalid Card Type";
    }
    return $errors;
}

function validateCreate ($name, $type, $value, $points){
    $errors=[];
    $name=trim((string)$name);
    $type=trim((string)$type);
    $value=(float)$value;
    $points=(integer)$points;
    if(!$points || $points < 0){
        $errors[]="Points cannot be less than 0 and must be an integer.";
    }
    if(!$value || $value < 0){
        $errors[]="Value cannot be less than 0";
    }
    if(!$name || (strlen($name) < 4 || strlen($name) > 35)) {
        $errors[]="Value must be greater than 4 and less than 35 characters";
    }
    if(!$type || $type != 'Gift Card'){
        $errors[]="Invalid Card Type";
    }
    return $errors;
}

function validateCustomer($username, $firstname, $lastname, $role, $password){
    $errors=[];
    $username = trim($username);
    $firstname = trim($firstname);
    $lastname = trim($lastname);
    $role = trim($role);
    $password = trim($password);
    if(!$username || strlen($username) > 100){
        $errors[]="Username is required and must be less than 100 characters";
    }
    if(!$firstname || strlen($firstname) > 100){
        $errors[]="First Name is required and must be less than 100 characters";
    }
    if(!$lastname || strlen($lastname) > 100){
        $errors[]="Last name is required and must be less than 100 characters";
    }
    if(!$role || !in_array($role, array('Customer', 'Admin'), true)){
        echo $role;
        $errors[]="Role must be either Customer or Admin";
    }
    if(!$password || strlen($password) <= 8 || strlen($password) > 100){
        $errors[]="Password must be at least 8 characters long";
    }
    return $errors;
}
?>