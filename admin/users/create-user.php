<?php
	require 'conection/conection.php';
	$s='';
	if(isset($_POST['submit']))
	{
		if($_POST['password'] == $_POST['conferm']){
			$role = 'admin';
            $rt= $ser->prepare("INSERT INTO users(name,lname,password,email,phone,role) VALUES(:fname,:lname,:password,:mail,:phone,:role)" );
            $rt->bindParam('name', $_POST['fname']);
            $rt->bindParam('lname', $_POST['lname']);
            $rt->bindParam('password', $_POST['password']);
            $rt->bindParam('email', $_POST['mail']);
            $rt->bindParam('phone', $_POST['phone']);
            $rt->bindParam('role', $role);
            $rt->execute();
		}
	}
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Add New User</h3>
		</div>	
	</div>
	<form method="post" class="create-form">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>First Name :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="fname">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Last Name :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="lname">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Password :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="password" name="password">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Conferm Password :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="password" name="conferm">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Email :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="mail">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Phone :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="phone">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<input type="submit" name="submit" value="Add User" class="btn btn-primary">
							<input type="button" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>