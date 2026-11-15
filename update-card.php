<?php
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/validation.php';

if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);exit('POST required');}
$id=filter_input(INPUT_POST,'cardId',FILTER_VALIDATE_INT);if(!$id||$id<1){http_response_code(400);exit('Invalid ID');}
$errors = validateInfo($id, $_POST['cardName'], $_POST['cardType'], $_POST['cardValue'], $_POST['cardPoints']); 
if(count($errors) >= 1){ http_response_code(403); exit(implode(',',$errors));} else {
try{$ok=updateGiftCard(openDatabase(),$id,$_POST);
if(!$ok){http_response_code(409);exit('Card not updated');}
header('Location: card-update.php?cardId='.$id,true,303);exit;}
catch(InvalidArgumentException $e){http_response_code(422);exit(escapeHtml($e->getMessage()));}
catch(Throwable $e){error_log($e->getMessage());http_response_code(500);exit('Unable to update request');}}
