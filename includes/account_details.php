<?php
if(isset($_COOKIE["student"])){
    $user = $_COOKIE["student"];
    $get_student_details = $connect->prepare("SELECT * FROM students WHERE username =?");
    $get_student_details->execute([$user]);
    while($row=$get_student_details->fetch(PDO::FETCH_ASSOC)){
        $name = $row["name"];
        $surname = $row["surname"];
        $gender = $row["gender"];
        $biometric = $row["biometric"];
        $program = $row["program"];
        $avatar = $row["avatar"];
        $phone = $row["phone"];
        $email = $row["email"];
        $home_address = $row["home_address"];
        $gender = $row["gender"];
        
        if($avatar == ""){
            $avatar = "avatar.svg";
        }
    }
    
    $find_semester_code = $connect->prepare("SELECT * FROM admin");
    $find_semester_code->execute();
    while($row=$find_semester_code->fetch(PDO::FETCH_ASSOC)){
        $semester = $row["semester"];
    }
    $sem_code = date("Y")."".$semester;
}
?>