<?php
// Sample user data for login validation
function getUsers() {
    return [
        ['email' => 'user1@example.com', 'password' => 'password'],
        ['email' => 'user2@example.com', 'password' => 'password'],
        ['email' => 'user3@example.com', 'password' => 'password'],
    ];
}

function validateLoginCredentials($email, $password) {
    $errors = [];
    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }
    return $errors;
}

function checkLoginCredentials($email, $password, $users) {
    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            return true;
        }
    }
    return false;
}

// Session management
function checkUserSessionIsActive() {
    return isset($_SESSION['email']);
}

function guard() {
    if (!checkUserSessionIsActive()) {
        header('Location: index.php');
        exit();
    }
}

// Error rendering
function renderErrorsToView($error) {
    if (empty($error)) {
        return '';
    }
    return "<div style='color: red;'>$error</div>";
}
?>
