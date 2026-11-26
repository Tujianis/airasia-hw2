<?php
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Admin', 'Customer'));

?>
<?php require_once __DIR__.'/includes/footer.php'; ?>