<?php 
	require 'conection/conection.php';
	
	$query = $ser->prepare("SELECT * FROM users WHERE role='admin'");
	$query->execute();
	$err = '';
	while($row=$query->fetch()){
		$user=$row['email'];
		$pass=$row['password'];
	}

	if(isset($_POST["submit"])){
		
		if($user == $_POST["username"] && $pass == $_POST["password"]){
			header('Location:view.php');
		}else{
		$eff = "wrong password or user-name !!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin-2.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<div class="container-fluide">
			<div class="container smart">
				Smart Generation
			</div>
			<div class="date">
				<div class="container">
					<?php
						$date = date('d-M-Y');
						echo $date;
					?>
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="container">
			<div class="panel panel-default admin-log">
				<div class="panel-heading">
					<b>Admin Login</b>
				</div>
				<div class="panel-body">
					<form class="login-form" method="post">
						<input type="text" placeholder="User Name" name="username">
						<input type="password" placeholder="Password" name="password">
						<input type="submit" class="btn btn-primary btn-block btn-r" value="Login" name="submit">
					</form>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="footer">
			Design and develope by Shivam, Karan, Khushi
		</div>
	</footer>
</body>
</html>