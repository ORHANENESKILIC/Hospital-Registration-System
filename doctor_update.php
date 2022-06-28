
<?php error_reporting(0);
 $connect = @new mysqli('localhost', 'root', '', 'hospitalregistration');
 $connect->set_charset("utf8");

 if ($connect->connect_errno) {
  die("mySQL Connection Failed: " . $connect->connect_error);
 }

?>

<?php
include("database.php");

$id=$_GET["id"];
$sorgu=$db->prepare('select * from doctor_registration where id= ?');
$sorgu->execute([$id]);
$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Registration</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossoring="anonymous"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<nav>


<div class="navigation">
            <!--LOGO-->
            <a class="logo">
                <img src="img/log.png"  width="300" alt="" onclick="location.href='#'">     
            </a>       
            <ul class="menu">
                <li><a href="index.php">Doctor Registration </a></li>
                <li><a href="Patient_registration.php">Patient Registration</a></li>
           </ul>        
        </div>
    </nav>

    
    
<div class="bg"> 
<?php
	foreach($personellist as $person){?>  
    <form class="form" action="" method="post">   
        <label for="newname">New Name:</label><br>
        <input type="text" id="newname" name="newname" value="<?php echo $person->Doctor_Name; ?>"><br><br>
        <label for="newclinics"><b>Select New Clinics:</b></label><br>
                <select  name="newclinics" class="newclinics">
                <option value="select"><?php echo $person->Doctor_Clinic; ?></option>
                    <?php
                        $query = mysqli_query($connect,"select * from clinics");
                        while ($data = mysqli_fetch_assoc($query)){;
                        ?>
                            
                        <option class='clinics'><?php echo $data['Name']; ?></option>
                    <?php } ?>
                
                </select><br><br><br>
        <label for="newmail" >New Mail:</label><br>
        <input type="text" id="newmail" name="newmail" value="<?php echo $person->Doctor_Mail; ?>"><br><br>
        <label for="newage">New Age:</label><br>
        <input type="text" id="newage" name="newage" value="<?php echo $person->Doctor_Age; ?>"><br>
        <input class="btn btn-success ms-1" type="submit" value="Update">
    </form>
    <?php } ?>
</div>
<?php

$db = new PDO("mysql:host=localhost;dbname=hospitalregistration;charset=utf8", "root", "");

$id = $_GET["id"];
$name = $_POST['newname'];
$clinic = $_POST['newclinics'];
$mail = $_POST['newmail'];
$age = $_POST['newage'];

if (!$name || !$clinic || !$mail || !$age ) {
    die("Please do not leave any blank spaces.");
}

$add = $db->prepare("UPDATE doctor_registration SET Doctor_Name = ?, Doctor_Clinic = ?, Doctor_Mail = ?, Doctor_Age = ? where id= ?");
$add->execute([$name, $clinic, $mail, $age, $id]);

if ($add) {
    echo '<script>alert("Registration Update Successful")</script>';
    header("refresh:1; url=index.php");
}else {
    echo "Error";
}
?>
</body>
</html>