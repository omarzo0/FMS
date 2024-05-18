<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // Unset the session variable
    unset($_SESSION['id']);
}

// Redirect to the login page
header("Location: index.php");
exit();
?>
