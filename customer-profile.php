<?php
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Customer'));
$userData = getCustomerAccountInfo(openDatabase(), $_SESSION['user_id']);
?>

<main class="container py-4"><h1></h1>

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



<?php require_once __DIR__.'/includes/footer.php'; ?>