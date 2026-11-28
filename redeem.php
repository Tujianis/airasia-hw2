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
$card = findOneGiftCard(openDatabase(),$id);
$userData = getCustomerAccountInfo(openDatabase(), $_SESSION['user_id']);
?>
<div>
    <dl>
        <dt>Username</dt>
            <dd><?=escapeHtml($userData['username'])?> </dd>
        <dt>User Points </dt>
            <dd><?=escapeHtml($userData['points'])?> </dd>
        <dt>Card Name</dt>
            <dd><?=escapeHtml($card['cardName'])?></dd>
        <dt>Card Value</dt>
            <dd><?=escapeHtml($card['cardValue'])?></dd>
        <dt>Points</dt>
            <dd><?=escapeHtml($card['points'])?></dd>
    </dl>
    <form action="process-redemption.php" name="redeem" method="POST">
    <input type="hidden" name="form_name" value="redeem">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="cardId" value="<?=$id?>">
    <input type="hidden" name="userId" value="<?=$_SESSION['user_id']?>">
    <input type="hidden" name="accountId" value="<?=$userData['accountId']?>">
    <button class="btn btn-primary">Redeem Card</button>
    </form>
</div>
<?php require_once __DIR__.'/includes/footer.php'; ?>