 <?php?>
     <link rel="stylesheet" href="css/styles.css">
    <img src="/images/airasia.jpg">

    <form action="card-details.php" method="get">
        <button type="submit"> Previous Page </button> 
    </form>
 <form action="card-list.php" method="post">
        <label for="cardName">Card Name</label>
        <input id="cardName" name="cardName" value="Gift Card 1" required>

        <label for="cardType">Card Type</label>
        <input id="cardType" name="cardType" value="Online" required>

        <label for="cardValue">Card Value</label>
        <input id="cardValue" name="cardValue" value="23.54" required>

        <label for="cardPoints">Card Points</label>
        <input id="cardPoints" name="cardPoints" value="2354" required>
    <button type="submit"> Confirm Details </button>
</form>