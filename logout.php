<?php
session_start();
// Destroys user session
session_destroy();
echo "Logout successful";
header("location: index.php");
?>