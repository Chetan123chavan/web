<?php
// Start the session
session_start();

// Destroy the session to log out
session_destroy();

// Redirect to the login page (or home page)
header("Location: admin.html");
exit();
?>
