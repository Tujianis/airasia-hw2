<?php
require_once __DIR__.'/includes/db.php';
$id=filter_input(INPUT_GET,'cardId',FILTER_VALIDATE_INT);
if(!$id||$id<1){
    http_response_code(400);exit('Invalid ID');
}
$r=findOneGiftCard(openDatabase(),$id);
if(!$r){
    http_response_code(404);exit('Not found');
    }
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';?>

    <form action="card-details.php" method="get" href="card-list.php"">
        <button type="submit"> Previous Page </button> 
    </form>
 <form method="post" action="update-card.php?cardId=<?=$id?>">
        <input type="hidden" name="cardId" value="<?=$id?>">
        <label for="cardName">Card Name</label>
        <input id="cardName" name="cardName" value="<?=escapeHtml($r['cardName'])?>" required>

        <label for="cardType">Card Type</label>
        <input id="cardType" name="cardType" value="<?=escapeHtml($r['cardType'])?>" required>

        <label for="cardValue">Card Value</label>
        <input id="cardValue" name="cardValue" value="<?=escapeHtml($r['cardValue'])?>" required>

        <label for="cardPoints">Card Points</label>
        <input id="cardPoints" name="cardPoints" value="<?=escapeHtml($r['points'])?>" required>
<button class="btn btn-danger">Save changes</button> </form>
<?php require_once __DIR__.'/includes/footer.php'; ?>