<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

// Redirect to login page
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Επιτυχής Αποσύνδεση');
    window.location.href='index.php';
    </script>"); 
exit;
?>

