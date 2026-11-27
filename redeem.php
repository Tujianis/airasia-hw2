<?php
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Admin', 'Customer'));
$id=filter_input(INPUT_GET,'cardId',FILTER_VALIDATE_INT);
if(!$id||$id<1){http_response_code(400);exit('Invalid ID');}
$card = findOneGiftCard(openDatabase(),$id)
?>

<?php require_once __DIR__.'/includes/footer.php'; ?>