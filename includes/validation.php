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
?>