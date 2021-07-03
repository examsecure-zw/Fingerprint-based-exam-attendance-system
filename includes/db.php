<?php
/*
Avoiding sssion hijacking Script
*/
ini_set('session.cookie_httponly',true);
session_start();
if(isset($_SESSION["last_ip"]) == false){
    $_SESSION["last_ip"] = $_SERVER["REMOTE_ADDR"];
}
if($_SESSION["last_ip"] != $_SERVER["REMOTE_ADDR"]){
    session_unset();
    session_destroy();
}
date_default_timezone_set("Africa/Harare");
/*
End of Session Hijacking Avoidance Script
*/
/*Connecting to Server*/
$host = "localhost";
$dbname = "hit_secure";
$username = "root";
$password = "";
//Connecting
$connect = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//End of connecting to Server
//Connecting to SMS Server
$sms_username = "kingdompraise";
$sms_token = "63f82008489fd1a6a7e0ee9d72c0c19f";
?>