<?php
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/authorization.php';
$user = requireLogin(openDatabase());
requireRole($user, array('Admin'));
?>
   <div>
    <form action="card-list.php" method="get">
        <button type="submit"> Previous Page </button> 
    </form> 
   <form action="add-cust.php" name="customer" method="post">
        <input type="hidden" name="form_name" value="user">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
        <label for="username">User Name</label>
        <input id="username" name="username" required>
        <label for="firstname">First Name</label>
        <input id="firstname" name="firstname" required>
        <label for="lastname">Last Name</label>
        <input id="lastname" name="lastname" required>
        <input type="hidden" id="role" name="role" value="Customer" required>
        <label id="password">Password</label>
        <input id="password" name="password" required>
        <button type="submit"> Add Customer </button>
    </form>
</div>


<?php require_once __DIR__.'/includes/footer.php'; ?>