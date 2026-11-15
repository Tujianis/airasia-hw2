<?php
require_once __DIR__.'/includes/db.php';
if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);exit('POST required');}
$id=filter_input(INPUT_POST,'cardId',FILTER_VALIDATE_INT);if(!$id||$id<1){http_response_code(400);exit('Invalid ID');}
try{$ok=updateGiftCard(openDatabase(),$id,$_POST);
if(!$ok){http_response_code(409);exit('Request not found or not Open');}
header('Location: card-update.php?cardId='.$id,true,303);exit;}
catch(InvalidArgumentException $e){http_response_code(422);exit(escapeHtml($e->getMessage()));}
catch(Throwable $e){error_log($e->getMessage());http_response_code(500);exit('Unable to update request');}
