<?php 
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/validation.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Customer'));
$card = findOneGiftCard(openDatabase(),$_POST['cardId']);
$userData = getCustomerAccountInfo(openDatabase(), $_SESSION['user_id']);
if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);exit('POST required');}
if(!verifyCsrfToken()){
    http_response_code(403);
    exit('Invalid CSRF');
}
if(($_POST['form_name']??'')!=='redeem'){http_response_code(400);exit('Invalid form');}
$errors = validateRedemption($userData['points'], $card['points']); 
if(count($errors) >= 1){ http_response_code(403); exit(implode(',', $errors));}
else {
    try{
        $newPoints = $userData['points'] - $card['points'];
        redeemCard(openDatabase(), $_POST['cardId'], $_POST['accountId'], $card['points'], $newPoints);
    }catch(Throwable $e){
        exit;
    }
}
?>