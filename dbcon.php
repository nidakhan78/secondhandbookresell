<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "signup";


$conn = mysqli_connect($server,$user,$password,$db);

if($conn){
	
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



?>