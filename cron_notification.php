<?php
require 'vendor/autoload.php';
$basic  = new \Vonage\Client\Credentials\Basic("5668c0ba", "72ixgUUcB5zah4pa");
$client = new \Vonage\Client($basic);
include("includes/db.php");
// BulkSMS Webservices URL


$real_exam_date = date("m/d/Y");
$find_semester = $connect->prepare("SELECT * FROM admin ");
$find_semester->execute();
while($row=$find_semester->fetch(PDO::FETCH_ASSOC)){
    $semester = $row["semester"];
}
$sem_code =  date("Y")."".$semester;
$find_today_modules = $connect->prepare("SELECT * FROM calendar WHERE semester=? AND exam_date=?");
$find_today_modules->execute([$sem_code,$real_exam_date]);
while($row=$find_today_modules->fetch(PDO::FETCH_ASSOC)){
    $module_code = $row["module"];
    $exam_time = $row["exam_time"];
    $venue = $row["venue"];
    
    $find_module_details = $connect->prepare("SELECT * FROM modules WHERE module_code=?");
    $find_module_details->execute([$module_code]);
    while($row=$find_module_details->fetch(PDO::FETCH_ASSOC)){
        $module_name = $row["module_name"];
    }
    
    
    echo $module_code." ".$exam_time." ".$venue."<br>";
    echo "Get today 's students writing the Exams<br><br>";
    
    
    //Get rregistered students
    $find_students = $connect->prepare("SELECT * FROM registration WHERE sem_code=? AND module=?");
    $find_students->execute([$sem_code,$module_code]);
    while($row=$find_students->fetch(PDO::FETCH_ASSOC)){
        $reg_number = $row["reg_number"];
        
        //Get Student Details including phone number
        $find_the_individual_student = $connect->prepare("SELECT * FROM students WHERE username=?");
        $find_the_individual_student->execute([$reg_number]);
        while($row=$find_the_individual_student->fetch(PDO::FETCH_ASSOC)){
            
            $student_name = $row["name"];
            $student_surname = $row["surname"];
            $student_phone = $row["phone"];
            
            $student_phone = str_replace("+", "","{$student_phone},");
            $student_phone = str_replace(" ", "","{$student_phone}");
            
            
            $destinations = "{$student_phone}";
            $message = "Hi there {$student_name} {$student_surname} you have a {$module_name} {$module_code} exam which is being written in the {$venue} in the  {$exam_time}, good luck. Please arrive at the venue 30 minutes earlier";
            
            $response = $client->sms()->send(
               new \Vonage\SMS\Message\SMS("{$student_phone}", BRAND_NAME, $message)
            );

           $messager = $response->current();
            
           // echo $message."<br><br>";
            if ($messager->getStatus() == 0) {
    echo "The message was sent successfully\n";
} else {
    echo "The message failed with status: " . $message->getStatus() . "\n";
}
            // send via BulkSMS HTTP API
            
            
        }
    }
}
?>