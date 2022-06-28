<?php error_reporting(0);
 $connect = @new mysqli('localhost', 'root', '', 'hospitalregistration');
 $connect->set_charset("utf8");

 if ($connect->connect_errno) {
  die("mySQL Connection Failed: " . $connect->connect_error);
 }

?>

<?php
include("database.php");

$sorgu=$db->prepare('select * from patient_registration');
$sorgu->execute();
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
        <!-------Men And logo -------->
        <div class="navigation">
            <!--LOGO-->
            <a href="#" class="logo">
                <img src="img/log.png"  width="300" alt="" onclick="location.href='#'">     
            </a> 
            

            <!--------Menu------->
            <ul class="menu">
                <li><a href="index.php">Doctor Registration </a></li>
                <li><a href="patient_registration.php">Patient Registration</a></li>
                
            </ul>
            
        </div>
    </nav>
        <div class="userform">
        <h1>Patient Registration</h1>
        <form action="save_patient.php" method="POST">
        <input type="text" name="name" id="name" placeholder="Name" class="yazi" />
        <input type="text" name="city" id="city" placeholder="city" class="yazi" />
        <br />
        <label for="clinics"><b>Select Clinics:</b></label><br>
        <select name="clinics" class="clinics">
        <option value="select">not specified</option>
            <?php
                $query = mysqli_query($connect,"select * from clinics");
                while ($data = mysqli_fetch_assoc($query)){;
                ?>
                      
                <option class='clinics'><?php echo $data['Name']; ?></option>
            <?php } ?>
		
        </select><br><br><br>
        <input type="text" name="mail" id="mail" placeholder="Mail Adress" class="yazi" />
        <br />
        <label for="date"><b>Select date of birth:</b></label><br>
        <input type="date" name="date" id="date"  class="yazi" />
        <br />
        <br />
        <button class="buton">Save</button>
        <input type="reset" name="delete" value="Clean" class="buton" />
        </form>
        </div>
        <div class="bg3"></div>

    
        <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Clinic</th>
                <th scope="col">Mail</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
              </tr>

              <?php
			  foreach($personellist as $person){?>
			  
			<tr>
      <td><?= $person->id ?></td>
			  <td><?= $person->Patient_Name ?></td>
              <td><?= $person->Patient_City ?></td>
			  <td><?= $person->Patient_Clinic ?></td>
			  <td><?= $person->Patient_Mail ?></td>
              <td><?= $person->Patient_Date ?></td>
        <td>
        <a href="patient_delete.php?id=<?php echo $person->id; ?>"><button class="btn btn-danger">Delete</button></a>
        <a href="patient_update.php?id=<?php echo $person->id; ?>"> <button class="btn btn-success ms-1">Update</button></a>
        
    </td>
			  
			</tr>
			<?php } ?>
            </thead>
            
          </table>
        
 
        
</body>
</html>
