<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo  "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 </head>
 <body background = "crop.jpg";>
 		<style type="text/css">
 			#text{

		height: 20px;
		border-radius: 10px;
		padding: 10px;
		border: solid thin #aaa;
		width: 60%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: black;
		background-color:skyblue;
		border: none;
	}

	#box{

		background-color: transparent;
		margin: auto;
		width: 400px;
		padding: 40px;
	}

 		
 		</style>

 		<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name">
			<label style= "color:white">Username</label>
			<br><br>

			<input id="text" type="password" name="password">
			<label style= "color:white">Password</label>
			<br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<label style= "color:white">new to YSLTECH?<a href="signup.php">Click to sign up</a><br><br>
		</form>
	</div>
 </body>
 </html>