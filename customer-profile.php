<?php
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';

$user = requireLogin(openDatabase());
requireRole($user, array('Customer'));
$userData = getCustomerAccountInfo(openDatabase(), $user['userId']);
?>

<main class="container py-4"><h1></h1>

<dl>
    <dt>User name</dt>
        <dd><?=escapeHtml($userData['username'])?></dd>
    <dt>First Name</dt>
        <dd><?=escapeHtml($userData['firstName'])?></dd>
    <dt>Last Name</dt>
        <dd><?=escapeHtml($userData['lastName'])?></dd>
    <dt>Points</dt>
        <dd><?=escapeHtml($userData['points'])?></dd>
</dl>



<?php require_once __DIR__.'/includes/footer.php'; ?>