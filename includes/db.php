<?php

function escapeHtml($v) {return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}

function openDatabase($path = null) {
    if ($path === null) {
        $path = dirname(__DIR__) . '/database/rewards.db';
    }
    $pdo = new PDO('sqlite:' . $path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec('PRAGMA foreign_keys = ON');
    return $pdo;
} 
function createGiftCard($pdo, $data) {
    $stmt=$pdo->prepare('INSERT INTO giftcard(cardName, cardType, cardValue, points) VALUES(?,?,?,?)');
    $stmt->execute([$data['cardName'],$data['cardType'],$data['cardValue'],$data['cardPoints']]);
    return (int)$pdo->lastInsertId();
    
}
function findOneGiftCard($pdo, $id) {
    $stmt=$pdo->prepare('SELECT * FROM giftcard WHERE cardId=?');
    $stmt->execute([$id]);
    $card = $stmt->fetch();
    if(!$card){ //If the card value is invalid, error out
        http_response_code(404);
        exit('Record Not Found');
    } else{
        return $card;
    }
}
function findAllGiftCards($pdo) {
    $sql='SELECT * FROM giftcard';
    $stmt=$pdo->query($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}
function updateGiftCard($pdo, $id, $data) {
    $errors = validateInfo($id, $data['cardName'],$data['cardType'],$data['cardValue'],$data['cardPoints']);
    $stmt=$pdo->prepare("UPDATE giftcard SET cardName=?,cardType=?,cardValue=?,points=? WHERE cardId=?");
    $stmt->execute([$data['cardName'],$data['cardType'],$data['cardValue'],$data['cardPoints'],$id]);
    return $stmt->rowCount()===1;
}
function deleteGiftCard($pdo, $id) {
    $stmt=$pdo->prepare("DELETE FROM giftcard WHERE cardId=?");
    $stmt->execute([$id]);
    return $stmt->rowCount()===1;
}
function findUserById($pdo, $id) {
    $stmt=$pdo->prepare('SELECT role, username FROM user WHERE userId=?');
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    return $user;
}

?>
