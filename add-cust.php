<?php 
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/validation.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Admin'));

if($_SERVER['REQUEST_METHOD']!=='POST'){http_response_code(405);exit('POST required');}
if(!verifyCsrfToken()){
    http_response_code(403);
    exit('Invalid CSRF');
}
if(($_POST['form_name']??'')!=='user'){http_response_code(400);exit('Invalid form');}
$errors = validateCustomer($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['role'], $_POST['password']); 
if(count($errors) >= 1){ http_response_code(403); exit(implode(',', $errors));} else {
try{$id=createUser(openDatabase(),$_POST);
createCustomerAccount(openDatabase(), $id);
http_response_code(200);
exit('User and Account created');
}catch(InvalidArgumentException $e){http_response_code(422);echo '<h1>Request could not be submitted</h1><p>'.escapeHtml($e->getMessage());
}}

?>