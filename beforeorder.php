<?php

session_start();

if(!isset($_SESSION['user'])){
echo "You are logged out";
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		body{
			height: 100%;
			width: 100%;
			overflow-y: scroll;
		}
		.text .top_nav{
			width: 100%;
			height: 50px;
			background: white;
			padding: 0 50px;
			padding-top: 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.text .top_nav .left{
			display: flex;
			padding-top: 2px;
			padding-bottom: 2px;
			font-size: 25px;
			font-family: Times New Roman, serif;
		}

		.text .top_nav .navbar-right ul{
			display: flex;
			list-style: none;
			padding-top: 15px;
			font-family: sans-serif;
		}

		.text .top_nav .navbar-right ul li{
			float: right;
			margin: 0 40px;
		}

		.navbar-nav li{
			margin: 0;
			margin-left: 80px;
			margin-right: 200px;
		}
		.contain .navbar-nav .lefty{
			background: #DAA520;
		}
		header{
			background-image: url(bg4.jpg);
			height: 50vh;
			background-size: cover;
			background-position: center;
		}
		.headding{
			padding-left: 650px;
		}
		.search_bar{
			padding-left: 30px;
		}
		.search_bar input[type="text"]{
			height: 34px;
			border: 1px solid lightgrey;
			padding: 4px 10px;
			outline: none;
		}
		.search_bar input[type="text"]:focus{
			box-shadow: 0 0 5px rgba(81, 203, 238, 1);
		}
		.table-responsive{
			padding-left: 30px;
			padding-right: 20px;
			background-color: white;
		}
		th{
			background-color: #808080;
			color:white;
			padding: 5px;
			border: 2px solid lightgrey;

		}
		td{
			height: 50px;
			padding-left: 10px;
			border: 2px solid lightgrey;
		}
	</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php
header('Location: order.php'); 
?>
</head>

<body>
<div class="text">
	<div class="top_nav">
		<div class="left"><p>Second Hand Book Reselling</p></div>
		<div class="navbar-right">
			<ul>
				<li><p style= "font-size:16px;"></style> Hello, <a style= "color: red"><?php echo $_SESSION['user']; ?></a></p></li>
				<a href="addcart.php"><i style="font-size:22px; color: black" class="fa">&#xf07a;</i>
				<li> <a href="index.php" style="font-size: 16px; color: black; text-decoration: none">Logout </a><i class="fa fa-sign-out" style="font-size:16px; color: black"></i></li>
			</ul>
		</div>
	</div>
</div>

<nav class="navbar navbar-expand-lg bg-dark">
	<div class="contain">
 	<ul class="navbar-nav active">
    	<li class="nav-item">
       	 <a class="nav-link" href="user.php" style="color: white;">Sell Books</a>
      	</li>
     
      	<li class="nav-item">
       	 <a class="nav-link" href="mybooks.php" style="color: white;">My Books</a>
      	</li>
   
     	<li class="nav-item">
      	 <a class="nav-link" href="viewbooks.php" style="color: white;">View Books</a>
     	</li>
     	
     	<li class="lefty">
      	 <a class="nav-link" href="myorders.php" style="color: white;">My Orders</a>
     	</li>
 	 </ul>
	</div>
</nav>
<header>
	
</header><br>
<div class="headding">
<h3>My Orders</h3></div><br>

<div class="search_bar">
	<input type="text" name="" placeholder="Search Book Name" style="width: 20%;">
	<a href="#"><button style="background-color: blue; width: 40px; height: 36px; margin-left: -4px;"><i  class="fa" style="font-size:24px; color: white">&#xf002;</i></button></a>
</div><br>

<div class="table-responsive">
<table style="width:100%; border:1px solid lightgrey;" >
	
		<thead>
			<th>Order ID</th>
			<th>Book Name</th>
			<th>Date</th>
			<th>Shipping Address</th>
			<th>Total Amount</th>
			<th>Mode Of Payment</th>
		</thead>

		<tbody>
			<?php

				$db='signup';
				$conn = mysqli_connect('localhost','root');
				mysqli_select_db($conn,'signup');
				$uname = $_SESSION['user'];
				$query1 = "select * from registration where username='$uname'";
				$result1 = mysqli_query($conn,$query1);
				$row1 = mysqli_fetch_array($result1);
				$id = $row1["id"];

				$database_name = "orderdetails";
				$connec = mysqli_connect('localhost','root','');
				mysqli_select_db($connec,'orderdetails');

				if(isset($_POST['spay'])){
					$item_array_id = array_column($_SESSION["make_payment"], "up_id");
					if(isset($_POST['Payment'])){
							if(!in_array($_SESSION['nid'], $item_array_id)){
								$count = count($_SESSION["make_payment"]);
								$item_array = array(
									'up_id' => $_SESSION['nid'],
									'item_details' => $_SESSION['det'],
									'item_cdate' => date('Y-m-d'),
									'item_shipa' => $_SESSION['newship'],
									'item_cost' => $_SESSION['newtotal'],
									'item_mod' => $_SESSION['npayment'],
								);
								$_SESSION["make_payment"][$count] = $item_array;
								echo '<script>alert("Item Successfully Ordered")</script>';
								echo '<script>window.location="order.php"</script>';
							}else{
								echo '<script>alert("Product is already Ordered by You")</script>';
								echo '<script>window.location="myorders.php"</script>';
							}
						
					}else{
						$item_array = array(
							'up_id' => $_SESSION['nid'],
							'item_details' => $_SESSION['det'],
							'item_cdate' => date('Y-m-d'),
							'item_shipa' => $_SESSION['newship'],
							'item_cost' => $_SESSION['newtotal'],
							'item_mod' => $_SESSION['npayment'],
						);
						$_SESSION["make_payment"][0] = $item_array;	
					}
				}

				$cdate = date('Y-m-d');;

				$s = $_POST['ship'];
				$ns['ship'] = $s;
				$_SESSION['newship'] = $ns['ship'];

				$a = $_POST['Payment'];
				$na['Payment'] = $a;
				$_SESSION['npayment'] = $na['Payment'];

				$w = "INSERT INTO `uploadproducts`(`username`,`details`, `cost`, `cdate`, `shippingaddress`, `mode of payment`,`userid`) VALUES ('{$_SESSION['user']}','{$_SESSION['det']}','{$_SESSION['newtotal']}','$cdate','$s','$a','$id')";

				$query = mysqli_query($connec,$w);

				$orderid = mysqli_insert_id($connec);
				$_SESSION['newid'] = $orderid;
				
				?>

		</tbody>
	</table>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>