<?php
/* Set locale to Hebrew */
echo iconv("UTF-8", "windows-1255", $utfstring);


//User configuration:
$hostname = "127.0.0.1"; //webserver where the sql is stored.
$username = "root"; //username for the sql
$password = "toor"; //password for the sql
$db = "soofasms"; //database name
$path_to_send = "/var/www/send/delay.php"; //This should not be accessible from outside for security reasons.
//end of user configuration

$vpass = ($_POST['pass']);
$numf=($_POST['numf']);
$numt=($_POST['numt']);
$text=($_POST['text']);
$timem=($_POST['minutes']);
$timeh=($_POST['hours']);
$timem = $timem * 60;
$time = $timem + $timeh;


if (strlen(utf8_decode(html_entity_decode($text, ENT_COMPAT, 'UTF-8'))) > 1000) {
	echo "Text exceeded the limit of 1000 characters. ";
	echo strlen(utf8_decode(html_entity_decode($text, ENT_COMPAT, 'UTF-8')));
	echo "\n chars detected";
	exit();
}

if (is_numeric($time)) {
}
else {
echo 'Time value is wrong, this incident will be reported.';
exit();
}

if (is_numeric($numt)) {
}
else {
echo 'value cannot be empty or contain characters';
exit();
}

if (empty($vpass)) { ?>
	
	<html>

	<head>
	  <title>Soofa SMS</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--===============================================================================================-->
	  <link rel="icon" type="image/png" href="images/icons/images/icons/favicon.ico">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
	  <!--===============================================================================================-->
	</head>

	  <body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('images/icons/favicon.ico');"></i>
        <img class="img-fluid d-block" src="images/icons/favicon.ico" width="90"> </a>

    </div>
  </nav>
        <div class="contact1 align-items-start" >
	  <div class="contact1">
	    <div class="container-contact1">
	      <div class="contact1-pic js-tilt" data-tilt="">
		<img class="img-fluid d-block" src="images/img-01.png" > </div>
		</br>
		</br>
		<div><center><span class="contact1-form-title">Soofa SMS!</span></center>
		<div class="alert alert-warning">
	   	<strong>❗ Attention!</strong>  Password cannot be empty.
	  	</div>
		
		  <center><div><input type="button" class="contact1-form-btn" value="Back to application" onclick="history.go(-1);return true;" />
		  </br></br>
		  <img border="0" alt="Sofa" src="images/icons/favicon.ico" width="100" height="100"></center></div>
	      
	    </div>
	  </div>
	  <!--===============================================================================================-->
	  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/bootstrap/js/popper.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/select2/select2.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/tilt/tilt.jquery.min.js"></script>
	  </body>
	  <?php
	exit();
	
}

if ($numf == trim($numf) && strpos($numf, ' ') !== false or ($numf == "")) { ?>
	
	<html>

	<head>
	  <title>Soofa SMS</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--===============================================================================================-->
	  <link rel="icon" type="image/png" href="images/icons/images/icons/favicon.ico">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
	  <!--===============================================================================================-->
	</head>

	  <body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('images/icons/favicon.ico');"></i>
        <img class="img-fluid d-block" src="images/icons/favicon.ico" width="90"> </a>

    </div>
  </nav>
	<div class="contact1 align-items-start" >
	  <div class="contact1">
	    <div class="container-contact1">
	      <div class="contact1-pic js-tilt" data-tilt="">
		<img class="img-fluid d-block" src="images/img-01.png" > </div>
		</br>
		</br>
		<div><center><span class="contact1-form-title">Soofa SMS!</span></center>
		<div class="alert alert-warning">
	   	<strong>❗ Attention!</strong> "From" field cannot contatin spaces or left empty.
	  	</div>
		
		  <center><div><input type="button" class="contact1-form-btn" value="Back to application" onclick="history.go(-1);return true;" />
		  </br></br>
		  <img border="0" alt="Sofa" src="images/icons/favicon.ico" width="100" height="100"></center></div>
	      
	    </div>
	  </div>
	  <!--===============================================================================================-->
	  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/bootstrap/js/popper.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/select2/select2.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/tilt/tilt.jquery.min.js"></script>
	  </body>
	  <?php
	exit();
}

if ($numt == trim($numt) && strpos($numt, ' ') !== false or ($numt == "")) { ?>
	
	<html>

	<head>
	  <title>Soofa SMS</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--===============================================================================================-->
	  <link rel="icon" type="image/png" href="images/icons/images/icons/favicon.ico">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
	  <!--===============================================================================================-->
	</head>

	  <body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('images/icons/favicon.ico');"></i>
        <img class="img-fluid d-block" src="images/icons/favicon.ico" width="90"> </a>

    </div>
  </nav>
	<div class="contact1 align-items-start" >
	  <div class="contact1">
	    <div class="container-contact1">
	      <div class="contact1-pic js-tilt" data-tilt="">
		<img class="img-fluid d-block" src="images/img-01.png" > </div>
		</br>
		</br>
		<div><center><span class="contact1-form-title">Soofa SMS!</span></center>
		<div class="alert alert-warning">
	   	<strong>❗ Attention!</strong> "To" field cannot contatin spaces or left empty.
	  	</div>
		
		  <center><div><input type="button" class="contact1-form-btn" value="Back to application" onclick="history.go(-1);return true;" />
		  </br></br>
		  <img border="0" alt="Sofa" src="images/icons/favicon.ico" width="100" height="100"></center></div>
	      
	    </div>
	  </div>
	  <!--===============================================================================================-->
	  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/bootstrap/js/popper.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/select2/select2.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/tilt/tilt.jquery.min.js"></script>
	  </body>
	  <?php
	exit();
}


#db connection:
$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

#password escape string 
$vpassd = mysqli_real_escape_string($dbconnect, $vpass);
#look for password query
$query = mysqli_query($dbconnect, "select * from users where password = '$vpassd';")
   or die (mysqli_error($dbconnect));


#getting data from db
while ($row = mysqli_fetch_array($query)) {
$passdb = $row['password'];

}

#run sql queries
if ($vpassd == $passdb) {
	$numt=($_POST['numt']);
	$numf=($_POST['numf']);
	$text=($_POST['text']);
	$time=($_POST['hour']);
	$texte = html_entity_decode($text);
	$texte = str_replace("\"","\\\"",$texte);
	#echo "From: " , $numf , "<br><br>To: " , $numt ,"<br><br>Message: ", $text ,"<br><br><br><br>" . $texte ,"<br><br><br><br>";
	
	
	

	$message = exec("php $path_to_send $numf $numt \"$texte\" $time > /dev/null &");
 
	?>
	<html>

	<head>
	  <title>Soofa SMS</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--===============================================================================================-->
	  <link rel="icon" type="image/png" href="images/icons/images/icons/favicon.ico">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
	  <!--===============================================================================================-->
	</head>

	<body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('images/icons/favicon.ico');"></i>
        <img class="img-fluid d-block" src="images/icons/favicon.ico" width="90"> </a>

    </div>
  </nav>
	<div class="contact1 align-items-start" >
	  <div class="contact1">
	    <div class="container-contact1">
	      <div class="contact1-pic js-tilt" data-tilt="">
		<img class="img-fluid d-block" src="images/img-01.png" > </div>
		</br>
		</br>
		<div><center><span class="contact1-form-title">Soofa SMS!</span></center>
		<div class="alert alert-success">
	   	<strong>✌ Your message has been sent succefully</strong>
	  	</div>
		<div class="alert alert-info">
    		<center><strong>Message info:</strong>
		<p></br><b>From:</b> <?php echo htmlentities($numf) ?></p>
		<p><b>To:</b> <?php echo htmlentities($numt) ?></p>
		<p></br><b>Message:</b> <br><?php echo htmlentities(html_entity_decode($text, ENT_COMPAT, 'UTF-8')); ?></p></center></div>
		<center><div><input type="button" class="contact1-form-btn" value="Back to application" onclick="history.go(-1);return true;" />
		  </br></br>
		  <img border="0" alt="Sofa" src="images/icons/favicon.ico" width="100" height="100"></center></div>
	      
	    </div>
	  </div>
	  <!--===============================================================================================-->
	  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/bootstrap/js/popper.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/select2/select2.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/tilt/tilt.jquery.min.js"></script>
	  </body>

	  <?php
}

	  else { ?>
	  <html>

	  <head>
	  <title>Soofa SMS</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--===============================================================================================-->
	  <link rel="icon" type="image/png" href="images/icons/images/icons/favicon.ico">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	  <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
	  <!--===============================================================================================-->
	</head>

	<body style="background-color:#343a40">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i style="background-image: url('images/icons/favicon.ico');"></i>
        <img class="img-fluid d-block" src="images/icons/favicon.ico" width="90"> </a>

    </div>
  </nav>
	<div class="contact1 align-items-start" >
	  <div class="contact1">
	    <div class="container-contact1">
	      <div class="contact1-pic js-tilt" data-tilt="">
		<img class="img-fluid d-block" src="images/img-01.png" > </div>
		</br>
		</br>
		<div><center><span class="contact1-form-title">Soofa SMS!</span></center>
		<div class="alert alert-danger">
	   	<strong>❌ Wrong password!</strong>  Please check your password and try again.
	  	</div>
		
		  <center><div><input type="button" class="contact1-form-btn" value="Back to application" onclick="history.go(-1);return true;" />
		  </br></br>
		  <img border="0" alt="Sofa" src="images/icons/favicon.ico" width="100" height="100"></center></div>
	      
	    </div>
	  </div>
	  <!--===============================================================================================-->
	  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/bootstrap/js/popper.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/select2/select2.min.js"></script>
	  <!--===============================================================================================-->
	  <script src="vendor/tilt/tilt.jquery.min.js"></script>
	</body>


		  <?php

	  
   }


?>
