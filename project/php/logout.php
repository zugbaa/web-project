<?php

session_start();

session_destroy();

if (isset($_SESSION['original_url'])) {
    $original_url = $_SESSION['original_url'];
    unset($_SESSION['original_url']); 
    header("Location: " . $original_url);
    exit;
 } else {
    header("Location: index.php");
    exit;
 }
 
exit;