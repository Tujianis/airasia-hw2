<?php?>
    <link rel="stylesheet" href="css/styles.css">
    <img src="/images/airasia.jpg">

<div> 
    <form action="login.php" method="get">
   <button type="submit"> Log Out </button> 
    </form>
    <form action="card-details.php" method="post">
        <label for="cardName">Card Name: Gift Card 1</label>
        <label for="cardType">Card Type: Online</label>
        <label for="cardValue">Card Value: 23.54</label>
        <label for="cardPoints">Card Points: 2354</label>
        <button type="submit"> View Card </button>
        <img src="/images/gift-card.jpeg">
    </form>

        <form action="card-add.php" method="post">
        <label for="Add Card">Add a new Card</label>

        <button type="submit"> Add Card </button>
    </form>
</div>