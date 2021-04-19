<?php 
session_start();


	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>YSLTECH</title>
 </head>
 <body style="color:white"background="slatt.jpg">
 		<a href="logout.php" style="color:white">Logout</a>
      <h3 style="color:white">This is the index page</h3>

      <br>
     <h1 style="color:white">WELCOME TO YSLTECH, <?php echo $user_data['name']; ?>
 </body>
 </html>