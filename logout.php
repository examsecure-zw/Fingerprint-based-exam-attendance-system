<?php
include("includes/db.php");
unset($_COOKIE['student']); 
setcookie('student', null, -1, '/');  
header("location:index");
?>