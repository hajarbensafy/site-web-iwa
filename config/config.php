<?php
session_start();

// Constantes du site
define('SITE_TITLE', 'IWA Formation');
define('SITE_URL', 'http://localhost/iwa-formation');

// Fonctions utiles
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function isStudent() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'student';
}

function redirect($path) {
    header("Location: " . SITE_URL . $path);
    exit();
} 