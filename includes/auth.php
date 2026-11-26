<?php
function requireLogin($pdo) {
    session_start();
    if (empty($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    if (time() - (isset($_SESSION['last_activity']) ? $_SESSION['last_activity'] : 0) > 1200) {
        header('Location: logout.php'); 
        exit;
    }
    $user = findUserById($pdo, (int) $_SESSION['user_id']);
    if (!$user) {
        header('Location: login.php');
        exit;
    }
    if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}   $_SESSION['last_activity'] = time();
    $_SESSION['display_name'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    return $user;
}

?>