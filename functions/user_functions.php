<?php
    function isUserLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    function redirectIfNotLoggedIn() {
        if (!isUserLoggedIn()) {
            header("Location: /views/index.php");
            exit;
        }
    }

    function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
?>