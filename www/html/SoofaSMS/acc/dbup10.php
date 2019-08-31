<?php
$hostname = "127.0.0.1";
$username = "sofa";
$password = "nokian73AgarretT25";
$db = "sofasms";
$num10 = "10";
$payeremail = ($_GET["email"]);
$validationcode = ($_GET["validcode"]);

if ($validationcode == 'PoNtChO0') {
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	#db connection:
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

	if ($dbconnect->connect_error) {
	  die("Database connection failed: " . $dbconnect->connect_error);
	}





	$randomstr = generateRandomString();
	#echo $randomstr , "<br>";
	$smscode = $randomstr;

	$query = mysqli_query($dbconnect, "SELECT COUNT(id) AS idc FROM users;")
	   or die (mysqli_error($dbconnect));

	#getting data from db
	while ($row = mysqli_fetch_array($query)) {
	$newid = $row['idc'];
	$newid = ++$newid;
	}


	#run sql queries 
	$query = mysqli_query($dbconnect, "insert into users(id,user,password,count) values('$newid','defaultuser','$randomstr','10');")
	   or die (mysqli_error($dbconnect));



	header("Location: smtpreg.php?sms=$smscode&amount=$num10&payeremail=$payeremail");

	}

else {
	echo 'not authorized';
}
?>
