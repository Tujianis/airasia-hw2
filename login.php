<?php
require_once __DIR__.'/includes/header.php';?>    
<div> 
    <form action="authenticate.php" method="post">
        <label for="username">Username </label>
        <input id="username" name="username" required>

        <label for="password">Password </label>
        <input id="password" name="password" required>

        <button type="submit"> Login </button>
    </form>
    </div>
<?php require_once __DIR__.'/includes/footer.php'; ?>