<?php
// Página inicial (redireciona para login)
include 'config.php';

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}   
?>
