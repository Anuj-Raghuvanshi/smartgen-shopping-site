<?php
	require 'conection/conection.php';
	$s='';
	$rec = $ser->prepare("SELECT * FROM contact");
	$rec->execute();
	while($result=$rec->fetch()){
		$id = $result['id'];
		$address = $result['address'];
		$phone = $result['phone'];
		$email = $result['email'];
	}
    if(isset($_POST['submit'])){
		$rt= $ser->prepare("UPDATE contact SET address=:address,phone=:phone,email=:email WHERE id=$id" );
		$rt->bindParam('address', $_POST['address']);
		$rt->bindParam('phone', $_POST['phone']);
		$rt->bindParam('email', $_POST['email']);
		$rt->execute();
		$s='ok';
		header('Location:view.php');
	}
	if(isset($_POST['cancel'])){
		header('Location:view.php');
	}
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Contact Us</h3>
		</div>	
	</div>
	<form method="post" class="create-form">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Address :</b>
							</div>
							<div class="col-md-8 text-left">
								<textarea name="address"><?php echo $address; ?></textarea>
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
								<input type="number" name="phone" value="<?php echo $phone; ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>E-Mail :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="email" value="<?php echo $email; ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<input type="submit" name="submit" value="Change" class="btn btn-primary">
							<input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>