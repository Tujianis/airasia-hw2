   <?php?>
    <link rel="stylesheet" href="css/styles.css">
    <img src="/images/airasia.jpg">

   <div>
    <form action="card-list.php" method="get">
        <button type="submit"> Previous Page </button> 
    </form> 
   <form action="card-list.php" method="post">
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