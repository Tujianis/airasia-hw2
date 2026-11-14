<?php
require_once __DIR__.'/includes/db.php';
$rows=findAllGiftCards(openDatabase());?>
<?php require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/nav.php';?>
<main class="container py-4"><h1>Gift Cards</h1>
<form method="get" class="row g-2 mb-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Course</th>
                <th>Details</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $r):?>
        <tr>
            <td><?=(int)$r['cardId']?></td>
            <td><?=escapeHtml($r['cardName'])?></td>
            <td><?=escapeHtml($r['cardType'])?></td>
            <td><?=escapeHtml($r['cardValue'])?></td>
            <td><?=escapeHtml($r['points'])?></td>
            <td><a href="card-details.php?cardId=<?=(int)$r['cardId']?>">View Card</a></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</main>
<?php require_once __DIR__.'/includes/footer.php'; ?>