<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
	body{
		font-family: sans-serif;
		background: url(bg5.jpg) no-repeat;
		background-size: cover;
	}
	.login-box{
		width: 280px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
	}
	.login-box h1{
		float: left;
		font-size: 40px;
		border-bottom: 2px solid #4dd0e1;
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
	.textbox input{
		border: none;
		outline: none;
		color: white;
		background: none;
		font-size: 18px;
		width: 80%;
		float: left;
		margin: 0 10px;
	}
	::placeholder {
  		color: white;
  		opacity: 1;
	}
	.btn{
		width: 100%;
		background: black;
		border: 2px solid #4dd0e1;
		color: white;
		padding: 5px;
		font-size: 20px;
		cursor: pointer;
		margin: 12px 0;
	}
	.btn:hover, .btn:active{
		background-color: #4dd0e1;
	}
</style>

</head>

<body>
	
<div class="login-box">
	<h1>Admin Login</h1>

	<form action="logincheck.php" method="POST">
	<div class="textbox">
		<input type="text" placeholder="Enter Admin ID" name="aduser" value="" autocomplete="off">
	</div>

	<div class="textbox">
		<input type="password" placeholder="Enter Password" name="passw" value="">
	</div>

	<b><a href="admin.php"><input class="btn" type="submit" name="submit" value="Login"></a></b><br><br><br>
	<i class="fa fa-arrow-left" aria-hidden="true" style="padding-left: 80px; color: white;"></i>
	<a href="index.php" style="color: white; text-decoration: none; font-size: 15px; text-align: center; padding: 2px;">Back To Home</a>

</div>
</form>
</body>
</html>