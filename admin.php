<?php
session_start();

if(!isset($_SESSION['aduser'])){
	header('location:index.php');
	}
?>

<?php
	if(isset($_POST['bsearch'])){
		$valuetoSearch = $_POST['valuetosearch'];
		$que = "SELECT * FROM `imgupload` WHERE CONCAT(`username`, `image`, `book name`, `description`, `author name`, `category`, `language`, `purchase date`, `book condition`, `price`, `selling date`, `book status`) LIKE '%".$valuetoSearch."%' ";
		$search_result = filterTable($que);
	}else{
		$que = "SELECT * FROM `imgupload`";
		$search_result = filterTable($que);
	}

	function filterTable($que){
		$con = mysqli_connect('localhost','root','','displayupload');
		$filter_result = mysqli_query($con, $que);
		return $filter_result;
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
		.search_bar{
			padding-left: 30px;
		}
		.search_bar input[type="text"]{
			border: 1px solid lightgrey;
			padding: 4px 10px;
			outline: none;
		}
		.search_bar input[type="text"]:focus{
			box-shadow: 0 0 5px rgba(81, 203, 238, 1);
		}
		.tab{
			padding-left: 15px;
			padding-right: 15px;
		}
		th{
			background-color: #808080;
			color:white;
			border-color: lightgrey;
			text-align: left;
			padding-left: 15px;
			
		}
		td{
			padding-left: 5px;
			height: 120px;
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
   
     	<li class="lefty">
      	 <a class="nav-link" href="admin.php" style="color: white;">View Books</a>
     	</li>
     	
     	<li class="nav-item">
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
<h3>View Books</h3></div>

<form action="admin.php" method="POST">
<div class="search_bar">
	<input type="text" name="valuetosearch" placeholder=" Search" style="width: 20%; height: 35px;" autocomplete="OFF">
	<button type="subbmit" name="bsearch" style="background-color: blue; width: 40px; height: 36px; margin-left: -4px;"><i class="fa" style="font-size:24px; color: white">&#xf002;</i></button>
</div>
</form>
</div><br>

<div class="tab">
<table class="text-center" border="1"  style="width:100%; border-color: lightgrey;">
	
		<thead>
		<th>Username</th>
		<th>Image</th>
		<th>Book Name</th>
		<th>Description</th>
		<th>Author<br>Name</th>
		<th>Category</th>
		<th>Language</th>
		<th>Purchase<br>Date</th>
		<th>Book<br>Condition</th>
		<th>Price</th>
		<th>Selling<br>Date</th>
		<th>Book<br>Status</th>
		</thead>
		
		<tbody>
			
	<?php

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'displayupload');

				$displayquery = " select * from imgupload ";
				$querydisplay = mysqli_query($con,$displayquery);

				// $row = mysqli_num_rows(querydisplay);
				if(mysqli_num_rows($querydisplay) > 0){

				while ( $result = mysqli_fetch_array($querydisplay) ){
					while( $result = mysqli_fetch_array($search_result)){
					?>

					<tr>
						<td> <?php echo $result['username']; ?> </td>
						<td> <img src=" <?php echo $result['image']; ?>" height="100px" width="100px"> </td>
						<td> <?php echo $result['book name']; ?> </td>
						<td> <?php echo $result['description']; ?> </td>
						<td> <?php echo $result['author name']; ?> </td>
						<td> <?php echo $result['category']; ?> </td>
						<td> <?php echo $result['language']; ?> </td>
						<td> <?php echo $result['purchase date']; ?> </td>
						<td> <?php echo $result['book condition']; ?> </td>
						<td> <?php echo $result['price']; ?> </td>
						<td> <?php echo $result['selling date']; ?> </td>
						<td> <?php echo $result['book status']; ?> </td>
					</tr>

				<?php
			
		}	
	}

			}else{
				echo '<script>window.location="admin.php"</script>';
			}

	?>

		</tbody>
	</table>
</div><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>