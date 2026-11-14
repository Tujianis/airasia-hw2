<?php
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';
require_once __DIR__.'/includes/db.php'?>

   <div>
    <form action="card-list.php" method="get">
        <button type="submit"> Previous Page </button> 
    </form> 
   <form action="create" method="post">
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