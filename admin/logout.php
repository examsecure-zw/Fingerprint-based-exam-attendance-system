<?php
include("../includes/db.php");
unset($_COOKIE['admin']); 
setcookie('admin', null, -1, '/');  
header("location:index");
?>