<?php

$db = new PDO("mysql:host=localhost;dbname=hospitalregistration;charset=utf8", "root", "");


$name = $_POST['name'];
$clinic = $_POST['clinics'];
$mail = $_POST['mail'];
$age = $_POST['age'];




if (!$name || !$clinic || !$mail || !$age ) {
    die("Please do not leave any blank spaces.");
}

$add = $db->prepare("INSERT INTO doctor_registration SET Doctor_Name = ?, Doctor_Clinic = ?, Doctor_Mail = ?, Doctor_Age = ?");
$add->execute([$name, $clinic, $mail, $age]);

if ($add) {
    echo '<script>alert("Registration Successful")</script>';
    header("refresh:1; url=index.php");
}else {
    echo "Error";
}


?>
