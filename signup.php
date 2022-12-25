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

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

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
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<script>
		function validateForm(){
			let x = document.forms["signupform"]["user_name"].value;
			if(x==""){
				alert("User Name cannot be empty");
				return false;
			}
			let spcha = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
			if(spcha.test(x)){
				alert("user name cannot conatin special charters");
				return false;
			}
			let y = document.forms["signupform"]["password"].value;
			if(y.length<8){
				alert("Password should atleast conatin 8 charaters");
				return false;
			}
		}
	</script>

	<div id="box">
		
		<form name = "signupform" onsubmit="return validateForm()" method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="user_name"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
            <input id="text" type="email" name="email" placeholder="email"><br><br>
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>