<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
	body{
		font-family: sans-serif;
		background: url(bg2.jpg) no-repeat;
		background-size: cover;
	}
	.login-box{
		width: 280px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: black;
	}
	.login-box h1{
		float: left;
		font-size: 40px;
		border-bottom: 6px solid #4dd0e1;
		margin-bottom: 50px;
		padding: 13px 0;
	}
	.textbox{
		width: 100%;
		overflow: hidden;
		font-size: 20px;
		padding: 8px 0;
		margin: 8px 0;
		border-bottom: 1px solid #4dd0e1;
	}
	.textbox i{
		width: 26px;
		float: left;
		text-align: center;
	}
	.textbox input{
		border: none;
		outline: none;
		background: none;
		text-decoration: none;
		color: black;
		font-size: 18px;
		width: 80%;
		float: left;
		margin: 0 10px;
	}
	.btn{
		width: 100%;
		background: none;
		border: 2px solid #4dd0e1;
		color: black;
		padding: 5px;
		font-size: 18px;
		cursor: pointer;
		margin: 12px 0;
	}
	.btn:hover, .btn:active{
		background-color: #4dd0e1;
	}
</style>

</head>

<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username_search = " select * from registration where username='$username' ";
	$query = mysqli_query($conn,$username_search);

	$username_count = mysqli_num_rows($query);

	if($username_count){
		$username_pass = mysqli_fetch_assoc($query);

		$db_pass= $username_pass['password'];

		$_SESSION['user'] = $username_pass['username'];

		$pass_decode = password_verify($password, $db_pass);

		if($pass_decode){
			echo "Login Successful";
			header('location:user.php');
		}else{
				?>
					<script>
						alert("Password is Incorrect");
					</script>
				<?php
		}

		}else{
				?>
					<script>
						alert("Invalid Username");
					</script>
				<?php
		}
}

?>

	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

<div class="login-box">
	<h1>Login</h1>

	<div class="textbox">
		<i class="fa fa-user" style="font-size:25px;color:black"></i>
		<input type="text" placeholder="Username" name="username" value="" autocomplete="off">
	</div>

	<div class="textbox">
		<i class="fa fa-lock" style="font-size:26px;color:black"></i>
		<input type="password" placeholder="Password" name="password" value="">
	</div>

	<a href="user.php"><input class="btn" type="submit" name="submit" value="Sign in"></a>
	<p class="msg">Don't have an account? <a href="register.php">Register Here!</a></p><br>
	<i class="fa fa-arrow-left" aria-hidden="true" style="padding-left: 65px; color: black;"></i>
	<a href="index.php" style="font-size: 15px; text-align: center; padding: 2px; color: black; text-decoration: none;">Back To Home</a>

</div>

</form>

</body>
</html>