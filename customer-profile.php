<?php
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Customer'));
?>


<?php require_once __DIR__.'/includes/footer.php'; ?>