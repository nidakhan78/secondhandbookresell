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
		background: url(bg3.jpg) no-repeat;
		background-size: cover;
	}

	.login-page{
		width: 360px;
		padding: 5% 0 0;
		margin: auto;
	}

	.form{
		position: relative;
		z-index: 1;
		background: #000;
		max-width: 360px;
		margin: 0 auto 40px;
		padding: 45px;
		text-align: center;
	}

	.form input{
		outline: none;
		background: #f2f2f2;
		width: 100%;
		border: 0;
		margin: 0 0 5px;
		padding: 15px;
		box-sizing: border-box;
		font-size: 14px;
	}

	.form button{
		text-transform: uppercase;
		outline: 0;
		background: orange;
		width: 100%;
		border: none;
		padding: 15px;
		color: #fff;
		font-size: 14px;
		cursor:pointer;
		transition: .5s;
	}

	.form button:hover, .form button:active{
		background: green;
		border: none;
	}


</style>
</head>

<body>

<?php

include 'dbcon.php';

$error="";

if(isset($_POST['submit'])){
	
	$username = mysqli_real_escape_string($conn, $_POST['username']) ;

	$email = mysqli_real_escape_string($conn, $_POST['email']) ;

	$address = mysqli_real_escape_string($conn, $_POST['address']) ;

	$city = mysqli_real_escape_string($conn, $_POST['city']) ;

	$contact = mysqli_real_escape_string($conn, $_POST['contact']) ;
	if (empty($_POST['contact'])) {
		$error = "Please enter mobile number";
	}
	else if (strlen($_POST['contact'])<10) {
		$error = "Mobile number should be of 10 digits";
	}else if (!preg_match("/^[6-9]\d{9}$/",$_POST['contact'])) {
		$error = "Invalid mobile number";
	}

	$password = mysqli_real_escape_string($conn, $_POST['password']) ;
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']) ;

	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$emailquery = "select * from registration where email='$email' ";
	$query = mysqli_query($conn,$emailquery);

	$emailcount = mysqli_num_rows($query);

	if($emailcount>0){
		?>
			<script>
				alert("Email already exists");
			</script>
		<?php
	}else{
		if($password === $cpassword){

			$insertquery = "insert into registration( username, email, address, city, contact, password, cpassword) values('$username','$email','$address','$city','$contact','$pass','$cpass')";

			$iquery = mysqli_query($conn, $insertquery);

			if($iquery){
	
					?>
						<script>
							alert("Inserted Successfully");
						</script>
					<?php
				}else{

					?>
						<script>
							alert("Not Inserted");
						</script>
					<?php
				}

						}else{
								?>
									<script>
										alert("Password are not matching");
									</script>
								<?php
						}
					}
				
			}
?>

	<div class="login-page">

	<div class="form">

	<form class="register-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
		<input type="text" name="username" placeholder="Username" required autocomplete="off">
		<input type="email" name="email" placeholder="Email" required autocomplete="off">
		<input type="text" name="address" placeholder="Address" required>
		<input type="text" name="city" placeholder="City" required>
		<input type="number" onkeypress="return event.charCode >= 48" min="1" step="1" name="contact" placeholder="Contact Number" required autocomplete="off">
		<input type="password" name="password" placeholder="Password" required>
		<input type="password" name="cpassword" placeholder="Confirm Password" required>
		<button type="submit" name="submit">Register</button>
	</form>

	</div>

	<div>
		<i class="fa fa-arrow-left" aria-hidden="true" style="color: blue; padding-left: 118px; padding-bottom: 20px;"></i>
		<a href="index.php" style="font-size: 15px; text-align: center; color: blue; padding: 2px; text-decoration: none;">Back To Home</a>
	</div>

	</div>	

</body>
</html>