<?php
session_start();
if ( isset( $_SESSION["userLogin"] ))
{
    session_destroy();

    echo "
    <script type='text/javascript'>
        alert('Logout Successful');
        window.location.href='login-student.html';
    </script>
    ";
}
?>

<?php
// session_start(); // Start session

// // Unset all of the session variables
// $_SESSION = array();

// // Destroy the session
// session_destroy();

// // Redirect to login page
// header("Location: index.php");
// exit;
?>