<?php
require_once __DIR__.'/auth.php';

function requireRole($user, $allowedRoles) {
    if (!in_array($user['role'], $allowedRoles, true)) {
        http_response_code(403);
        exit('You are not authorized to perform this action.');
        }
}
function verifyCsrfToken() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_POST['csrf_token']) || empty($_SESSION['csrf_token'])) {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
}
?>
