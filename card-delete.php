<?php
require_once __DIR__.'/includes/db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $id=filter_input(INPUT_POST,'cardId',FILTER_VALIDATE_INT);if(!$id||$id<1){http_response_code(400);exit('Invalid ID');}
 try{$ok=deleteGiftCard(openDatabase(),$id);
 if(!$ok){http_response_code(409);
 exit('Request not found or not Open');}header('Location: card-list.php',true,303);exit;}
 catch(Throwable $e){error_log($e->getMessage());http_response_code(500);exit('Unable to cancel');}
}
if($_SERVER['REQUEST_METHOD']!=='GET'){http_response_code(405);exit('Method not allowed');}
$id=filter_input(INPUT_GET,'cardId',FILTER_VALIDATE_INT);if(!$id||$id<1){http_response_code(400);exit('Invalid ID');}
$r=findOneGiftCard(openDatabase(),$id);if(!$r){http_response_code(404);exit('Not found');}
require __DIR__.'/includes/header.php';
require __DIR__.'/includes/nav.php';?>
<main class="container py-4"><h1>Delete Gift Card</h1><p>Delete Giftcard #<?=$id?>? The card will be deleted.</p>
<form method="post"><input type="hidden" name="cardId" value="<?=$id?>"><button class="btn btn-danger" href="card-delete.php?cardId=<?=$id?>">Yes, cancel request</button></form>
<a href="card-details.php?cardId=<?=$id?>">Keep Giftcard</a></main><?php require __DIR__.'/includes/footer.php';?>
