
<?php
try{
	$host='localhost';
	$databasename='hospitalregistration';
	$user='root';
	$pass='';
	$db=new
	PDO("mysql:host=$host;dbname=$databasename;charset=UTF8","$user",$pass);
}

catch(PDOException $e){
	print $e->getmessage();
}
?>