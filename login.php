<?php
    /**
    *
    *@Database connection
    */
    require 'db/conection.php';

    /**
    *
    *@User login
    */
    $query = $ser->prepare("SELECT * FROM users");
	$query->execute();
	$err = '';
	while($row=$query->fetch()) 
	{
		$user=$row['email'];
		$pass=$row['password'];
		$role=$row['role'];
	}

	if(isset($_POST["submit"]))
	{
		if($user == $_POST["name"] && $pass == $_POST["password"] && $role == 'user')
		{
			header('Location:product.php');
		} else
		{
		  $err = "wrong password or user-name !!";
		}
	}

    $title="LOGIN | Online Shopping";
    include 'partials/header.php';
    include 'partials/navbar.php';
?>
<div class="shadow">
    <!--breadcrums start-->
    <div class="bredcrumbs">
        <div>
            <div class="container">
                <div>
                    <h3>Login</h3>
                </div>
            </div>
            <div class="border-out">
                <div class="border-in">
                    <div class="container">
                        <div class="crurrent-page">
                            <a href="index.php">HOME</a> / <b> LOGIN </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrums ends-->
    <div class="container">
    	<div class="panel panel-primary login">
        	<div class="panel-heading">
        		Login
        	</div>
        	<div class="panel-body">
		        <form method="post">
		        	<input type="text" name="name" placeholder="Username" class="form-control">
		        	<input type="password" name="password" placeholder="Password" class="form-control">
		        	<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
		        </form>
		        <span class="error"><?php echo $err; ?></span>
		        <a href="signup.php" class="pull-right">Signup</a>
        	</div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php';?>  