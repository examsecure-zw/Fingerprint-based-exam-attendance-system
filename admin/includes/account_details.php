<?php
if(isset($_COOKIE["admin"])){
    $user = $_COOKIE["admin"];
    $get_admin_details = $connect->prepare("SELECT * FROM admin where username=?");
    $get_admin_details->execute([$user]);
    while($row=$get_admin_details->fetch(PDO::FETCH_ASSOC)){
        $name = $row["name"];
        $surname = $row["surname"];
        $phone = $row["phone"];
        $email = $row["email"];
        $avatar = $row["avatar"];
        $semester = $row["semester"];
        $year = date("Y");
        $sem_code = $year."".$semester;
        
        if($avatar == ""){
            $avatar = "avatar.svg";
        }
    }
}
?>