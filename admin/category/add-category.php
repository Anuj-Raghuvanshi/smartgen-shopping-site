<?php
	require 'conection/conection.php';
	$s='';
	if(isset($_POST['submit'])){
		$rt= $ser->prepare("INSERT INTO category(name,is_active) VALUES(:name,:active)" );
		$rt->bindParam('name', $_POST['name']);
		$rt->bindParam('active', $_POST['active']);
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
			<h3>Add Category</h3>
		</div>	
	</div>
	<form method="post" class="create-form" enctype="multipart/form-data">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Name :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="name">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Is active :</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="active">
									<option value="0">
										No
									</option>
									<option value="1">
										Yes
									</option>
								</select>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<input type="submit" name="submit" value="Add" class="btn btn-primary">
							<input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>