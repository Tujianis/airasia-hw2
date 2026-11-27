<?php
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Admin', 'Customer'));

$id=filter_input(INPUT_GET,'cardId',FILTER_VALIDATE_INT);
if(!$id||$id<1){http_response_code(400);exit('Invalid Card ID');}
$r=findOneGiftCard(openDatabase(),$id);if(!$r){http_response_code(404);exit('Card not found');} 
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';

?>

<main class="container py-4"><h1>Request #<?=(int)$id?></h1>
<img source="/images/gift-card.jpeg">
<dl>
    <dt>Card Names</dt>
        <dd><?=escapeHtml($r['cardName'])?></dd>
    <dt>Card Type</dt>
        <dd><?=escapeHtml($r['cardType'])?></dd>
    <dt>Card Value</dt>
        <dd><?=escapeHtml($r['cardValue'])?></dd>
    <dt>Points</dt>
        <dd><?=escapeHtml($r['points'])?></dd>
</dl>
<form action="card-delete.php?cardId=<?=$id?>" method="POST">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
<button type="Submit" >Delete Gift Card</button>
</form>
<a class="btn btn-primary" href="card-update.php?cardId=<?=$id?>">Edit Gift Card</a> 
<a class="btn btn-secondary" href="redeem.php?cardId=<?=$id?>">Redeem Gift Card</a>
</main>
<?php require_once __DIR__.'/includes/footer.php'; ?>