<?php
session_start();
require_once __DIR__ . '/config.php';

function require_login() {
    if (empty($_SESSION['admin_logged_in'])) {
        header('Location: login.php');
        exit;
    }
}
