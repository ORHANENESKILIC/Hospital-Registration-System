<?php

$db = new PDO("mysql:host=localhost;dbname=hospitalregistration;charset=utf8", "root", "");

$name = $_POST['name'];
$city = $_POST['city'];
$clinic = $_POST['clinics'];
$mail = $_POST['mail'];
$date = $_POST['date'];

if (!$name || !$city || !$clinic || !$mail || !$date ) {
    die("Please do not leave any blank spaces.");
}

$add = $db->prepare("INSERT INTO patient_registration SET Patient_Name = ?, Patient_City = ?, Patient_Clinic = ?, Patient_Mail = ?, Patient_Date = ?");
$add->execute([$name, $city, $clinic, $mail, $date]);

if ($add) {
    echo '<script>alert("Registration Successful")</script>';
    header("refresh:1; url=patient_registration.php");
}else {
    echo "Bir hata oluştu.";
}
?>