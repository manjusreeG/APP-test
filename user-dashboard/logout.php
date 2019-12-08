<?php
session_start();
session_destroy();
unset($_Session['first_name']);
echo '<script type = "text/javascript"> alert("User has been successfully logged out.") </script>';
header('location: ../index.php');
?>