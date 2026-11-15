<?php
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/validation.php';

if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);exit('POST required');}
if(($_POST['form_name']??'')!=='giftcard'){http_response_code(400);exit('Invalid form');}
$errors = validateCreate($_POST['cardName'], $_POST['cardType'], $_POST['cardValue'], $_POST['cardPoints']); 
if(count($errors) >= 1){ http_response_code(403); exit(implode(',', $errors));} else {
try{$id=createGiftCard(openDatabase(),$_POST);header('Location: card-details.php?cardId='.$id,true,303);exit;}
catch(InvalidArgumentException $e){http_response_code(422);echo '<h1>Request could not be submitted</h1><p>'.escapeHtml($e->getMessage()).'</p><a href="card-add.php">Return to form</a>';}
catch(Throwable $e){error_log($e->getMessage());http_response_code(500);exit('Unable to save request');}}
