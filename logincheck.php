<?php
session_start();

$con = mysqli_connect('localhost', 'root' );
if($con){
	?>
		<script>
			alert("Connection Successful");
		</script>
	<?php
}else{
	?>
		<script>
			alert("No Connection");
		</script>
	<?php
}

$db = mysqli_select_db($con, 'adminsign');

if(isset($_POST['submit'])){
	$userlog = $_POST['aduser'];
	$password = $_POST['passw'];

	$sql = "select * from adminlog where adminuser = '$userlog' and pass = '$password'";

	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "Login Successful";
			$_SESSION['aduser'] = $userlog;
			header('location:admin.php');

		}else{
			echo "Login Failed";
			header('location:adminlogin.php');
			}
}

?>