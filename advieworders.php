<?php
session_start();

if(!isset($_SESSION['aduser'])){
	header('location:index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
			padding-top: 2px;
			padding-bottom: 2px;
			font-size: 25px;
			font-family: Times New Roman, serif;
		}

		.text .top_nav .navbar-right ul{
			display: flex;
			list-style: none;
			padding-top: 5px;
			font-family: sans-serif;
		}

		.text .top_nav .navbar-right ul li{
			float: right;
			margin: 0 40px;
		}

		.navbar-nav li{
			margin-left: 150px;
			margin-right: 80px;
		}
		.contain .navbar-nav .lefty{
			background: #DAA520;
		}
		.headding{
			padding-left: 600px;
		}
		.tab{
			padding-left: 30px;
			padding-right: 30px;
		}
		th{
			background-color: #808080;
			color:white;
			border-color: lightgrey;
			text-align: left;
			padding-left: 15px;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		td{
			padding-left: 15px;
		}
	</style>

</head>

<body>

<div class="text">
	<div class="top_nav">
		<div class="left"><p>Second Hand Book Reselling</p></div>
		<div class="navbar-right">
			<ul>
				<li> <a href="adlogout.php" style="font-size: 18px; color: black; text-decoration: none;">Logout </a><i class="fa fa-sign-out" style="font-size:16px; color: black"></i></li>
			</ul>
		</div>
		
	</div>
	
</div>

<nav class="navbar navbar-expand-lg bg-dark">
	<div class="contain">
 	<ul class="navbar-nav active">
   
     	<li class="nav-item">
      	 <a class="nav-link" href="admin.php" style="color: white;">View Books</a>
     	</li>
     	
     	<li class="lefty">
      	 <a class="nav-link" href="advieworders.php" style="color: white;">View Orders</a>
     	</li>

     	<li class="nav-item">
       	 <a class="nav-link" href="adviewusers.php" style="color: white;">View Users</a>
      	</li>
 	 </ul>
	</div>
</nav>
<br>

<div class="full">
<div class="headding">
<h3>View Orders</h3></div>
</div><br>

<div class="tab">
<table border="1" style="width:100%; border-color: lightgrey;">
	
		<thead>
		<th>Username</th>
		<th>Order ID</th>
		<th>Book Name</th>
		<th>Date</th>
		<th>Shipping Address</th>
		<th>Total Amount</th>
		<th>Mode of Payment</th>
		</thead>
		
		<tbody>
		
		<?php
				$database_name = "orderdetails";
				$connec = mysqli_connect('localhost','root','');
				mysqli_select_db($connec,'orderdetails');


				$displayquery = " select * from uploadproducts ORDER BY id ASC";
				$querydisplay = mysqli_query($connec,$displayquery);

				if(mysqli_num_rows($querydisplay) > 0){

				while ( $result = mysqli_fetch_array($querydisplay) ){

					?>
					
					<tr>
						<td> <?php echo $result['username']; ?> </td>
						<td> <?php echo $result['id']; ?> </td>
						<td> <?php echo $result['details']; ?> </td>
						<td> <?php echo $result['cdate']; ?> </td>
						<td> <?php echo $result['shippingaddress']; ?> </td>
						<td> <?php echo $result['cost']; ?> </td>
						<td> <?php echo $result['mode of payment']; ?> </td>
					</tr>
					
				<?php
				
				}

			}else{
				echo '<script>window.location="myorders.php"</script>';
			}
			
				?>

		</tbody>
	</table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>