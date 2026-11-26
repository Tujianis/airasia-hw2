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
   <form action="card-process.php" name="giftcard" method="post">
        <input type="hidden" name="form_name" value="giftcard">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
        <label for="cardName">Card Name</label>
        <input id="cardName" name="cardName" required>
        <label for="cardType">Card Type</label>
        <input id="cardType" name="cardType" required>
        <label for="cardValue">Card Value</label>
        <input id="cardValue" name="cardValue" required>
        <label for="cardPoints">Card Points</label>
        <input id="cardPoints" name="cardPoints" required>

        <button type="submit"> Add Card </button>
    </form>
</div>
<?php require_once __DIR__.'/includes/footer.php'; ?>