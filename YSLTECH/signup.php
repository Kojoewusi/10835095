<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,name) values ('$user_id','$user_name','$password','$name')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sign Up</title>
 </head>
 <body background = "crop.jpg";>
 		<style type="text/css">
 			#text{

		height: 25px;
		border-radius: 5px;
		padding: 10px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: crimson;
		border: none;
	}

	#box{

		background-color: transparent;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

 		
 		</style>

 		<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Sign Up</div>
            <input id="text" type="text" name="name">
			<label style= "color:white">name</label>
			<br><br>
			
            <input id="text" type="user_name" name="user_name">
			<label style= "color:white">user_name</label>
			<br><br>


			<input id="text" type="password" name="password">
			<label style= "color:white">Password</label>
			<br><br>

			

			<input id="button" type="submit" value="Signup"><br><br>

			<label style= "color:white">Already have an account?<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
 </body>
 </html>