<?php
require_once "recaptchalib.php";
require_once "vendor/autoload.php";

$secret = "6Lf68WkUAAAAALCixXIgpLpK62i7nmMk96eH_0EZ";
$response = null;
$reCaptcha = new ReCaptcha($secret);



if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) { 

	$hostname = "127.0.0.1";
	$username = "sofa";
	$password = "nokian73AgarretT25";
	$db = "sofasms";
	$user = ($_POST['username']);
	$phone =($_POST['phone']);
	$ccode = ($_POST['ccode']);
	
if (strlen($phone) <= 10) {
$phone = $ccode . $phone;
}

	#db connection:
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

	if ($dbconnect->connect_error) {
		 die("Database connection failed: " . $dbconnect->connect_error);
		}

	# escape string 
	$user = mysqli_real_escape_string($dbconnect, $user);
	$phone = mysqli_real_escape_string($dbconnect, $phone);



	#look for phone query
	$query = mysqli_query($dbconnect, "SELECT * FROM registerd where phone = '$phone';")
	 or die (mysqli_error($dbconnect));

	#getting data from db
	while ($row = mysqli_fetch_array($query)) {
	$currentphone = $row['phone'];
	}


	if ($phone != $currentphone) {

		#db connection:
		$dbconnect=mysqli_connect($hostname,$username,$password,$db);

		if ($dbconnect->connect_error) {
		  die("Database connection failed: " . $dbconnect->connect_error);
		}
		

		#count ID Query
			$query = mysqli_query($dbconnect, "SELECT COUNT(id) AS idc FROM users;")
		   or die (mysqli_error($dbconnect));

		#getting data from db
		while ($row = mysqli_fetch_array($query)) {
		$newid = $row['idc'];
		$newid = ++$newid;
		}

		
		#run sql queries 
		$query = mysqli_query($dbconnect, "insert into registerd (id,name,phone) values($newid,'$user','$phone');")
		   or die (mysqli_error($dbconnect));


		function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		$randomstr = generateRandomString();

		#run sql queries 
		$query = mysqli_query($dbconnect, "insert into users(id,user,password,count) values('$newid','freeuser','$randomstr','3');")
		   or die (mysqli_error($dbconnect));



		
		$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic('5dd3baa6', '2HLmL4wh2lnXkBWP'));
		$message = $client->message()->send([
		'type' => 'unicode',
		'to' => $phone,
		'from' => 'SoofaSMS',
		'text' => html_entity_decode($user) . ', Thank you for registering, Your 3 free SMS code is: ',
		]);
		
		$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic('5dd3baa6', '2HLmL4wh2lnXkBWP'));
		$message = $client->message()->send([
		'to' => $phone,
		'from' => 'SoofaSMS',
		'text' => $randomstr
		]);

                $maillog = fopen("/var/www/ssmmss/freelog.txt", "a") or die("Unable to open file!");
	        fwrite($maillog,"phone number: " . $phone . " Code: " . $randomstr);
	        fclose($maillog);
		
?>

<!DOCTYPE html>
<html>

<head>
  <title>Soofa SMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="../images/icons/favicon.ico">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!--===============================================================================================-->
</head>
<body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('favicon.ico');"></i>
        <img class="img-fluid d-block" src="../favicon.ico" width="90"> </a>
    </div>
  </nav>
  <div class="contact1 align-items-start">
    <div class="contact1" >
      <div class="container-contact1 w-100">
        <div class="contact1-pic js-tilt" data-tilt="">
          <img class="img-fluid d-block" src="../images/img-01.png"> </div>
        <br>
        <br>
        <div>
          <center>
            <span class="contact1-form-title">Soofa SMS!</span>
          </center>
          <div class="alert alert-success">
            <strong>✌ Congratulations!</strong> Your SMS code has been sent to your mobile phone.
         </div> 
          <center>
            <div>
              <input type="button" class="contact1-form-btn" value="Back to application" onclick="location.href = 'http://sofasms.com';">
              <br>
              <br>
              <img border="0" alt="Sofa" src="../favicon.ico" width="100" height="100">
            </div>
          </center>
        </div>
      </div>
    </div>
    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
  </div>
</body>

</html>
	  <?php                

			exit();
		
	}
	else { ?>
		<html>

	<head>
	  <title>Soofa SMS</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--===============================================================================================-->
	  <link rel="icon" type="image/png" href="../images/icons/favicon.ico">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../css/util.css">
	  <link rel="stylesheet" type="text/css" href="../css/main.css">
	  <!--===============================================================================================-->
	</head>

	  <body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('favicon.ico');"></i>
        <img class="img-fluid d-block" src="../favicon.ico" width="90"> </a>

    </div>
  </nav>
        <div class="contact1 align-items-start" >
	  <div class="contact1">
	    <div class="container-contact1">
	      <div class="contact1-pic js-tilt" data-tilt="">
		<img class="img-fluid d-block" src="../images/img-01.png" > </div>
		</br>
		</br>
		<div><center><span class="contact1-form-title">Soofa SMS!</span></center>
		<div class="alert alert-warning">
	   	<strong>❗ Attention!</strong>  Your phone number is already registerd.
	  	</div>
		
		  <center><div><input type="button" class="contact1-form-btn" value="Back to application" onclick="history.go(-1);return true;" />
		  </br></br>
		  <img border="0" alt="Sofa" src="../favicon.ico" width="100" height="100"></center></div>
	      
	    </div>
	  </div>
	  <!--===============================================================================================-->
	  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="../vendor/bootstrap/js/popper.js"></script>
	  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="../vendor/select2/select2.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="../vendor/tilt/tilt.jquery.min.js"></script>
	  </body>
	  <?php
}


}


else { ?>
       	<html>

	<head>
	  <title>Soofa SMS</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--===============================================================================================-->
	  <link rel="icon" type="image/png" href="../images/icons/favicon.ico">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="../css/util.css">
	  <link rel="stylesheet" type="text/css" href="../css/main.css">
	  <!--===============================================================================================-->
	</head>

	  <body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('favicon.ico');"></i>
        <img class="img-fluid d-block" src="../favicon.ico" width="90"> </a>

    </div>
  </nav>
        <div class="contact1 align-items-start" >
	  <div class="contact1">
	    <div class="container-contact1">
	      <div class="contact1-pic js-tilt" data-tilt="">
		<img class="img-fluid d-block" src="../images/img-01.png" > </div>
		</br>
		</br>
		<div><center><span class="contact1-form-title">Soofa SMS!</span></center>
		<div class="alert alert-warning">
	   	<strong>❗ Attention!</strong>  Cannot Validate captcha, try again.
	  	</div>
		
		  <center><div><input type="button" class="contact1-form-btn" value="Back to application" onclick="history.go(-1);return true;" />
		  </br></br>
		  <img border="0" alt="Sofa" src="../favicon.ico" width="100" height="100"></center></div>
	      
	    </div>
	  </div>
	  <!--===============================================================================================-->
	  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="../vendor/bootstrap/js/popper.js"></script>
	  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="../vendor/select2/select2.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="../vendor/tilt/tilt.jquery.min.js"></script>
	  </body>
	  <?php
	exit();
	
}


?>
