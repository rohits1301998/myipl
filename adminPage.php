<?php

session_start();

if(empty($_SESSION['admin_user'])){
	header('location:login.php');
	exit;
}
include('conn.php');
if(!empty($_POST['flush'])){
	mysqli_query($conn,"delete from `predictions`");
	header('location:adminPage.php');
	mysqli_close($conn);
	exit;	
}

$result=mysqli_query($conn,"select userID,match1,match2 from users INNER JOIN predictions on `sr no`=user_id ");
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styleTest.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >
	<br>
	<br>
	<br>
	<a href="logout.php">Logout</a>
<table class="table table-striped">
	<thead>
	<th>Username</th>
	<th>Match 1</th>
	<th>Match 2</th>
	</thead>
	<tbody>
		<?php
		while($row=mysqli_fetch_array($result)){
			echo '<tr>
			<td>'.$row["userID"].'</td>
			<td>'.$row["match1"].'</td>
			<td>'.$row["match2"].'</td>
		</tr>';	
		}

		?>
		
	</tbody>

</table>
<form action="" method="POST">
	<input type="submit" name="flush" value="flush DB">
</form>

</body>
</html>