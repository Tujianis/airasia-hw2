<?php
require_once __DIR__.'/includes/db.php';
require_once __DIR__.'/includes/auth.php';
require_once __DIR__.'/includes/db.php';

$pdo = openDatabase();
$stmt = $pdo->prepare(
'SELECT userId, password, username, role
FROM user
WHERE username = :username'
);
$stmt->execute([$_POST['username']]);
$user = $stmt->fetch();
if (!$user || !password_verify($_POST['password'], $user['password'])) {
http_response_code(405);
exit("Incorrect Username or Password");
} else { //If they pass the password check, get cookie, establish headers, start session
$https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
session_set_cookie_params(array(
'lifetime' => 0,
'path' => '/',
'secure' => $https,
'httponly' => true,
'samesite' => 'Lax',
));
session_start();
$_SESSION['user_id'] = (int) $user['userId'];
$_SESSION['display_name'] = $user['username'];
$_SESSION['role'] = $user['role'];
$_SESSION['last_activity'] = time();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
session_regenerate_id(true);
if($user['role'] == 'Customer'){
header('Location: customer-profile.php', true, 303);
exit;
} else {
    header('Location: card-list.php', true, 303);
    exit;
}
}
?>