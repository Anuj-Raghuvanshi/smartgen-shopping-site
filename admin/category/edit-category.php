<?php
	require 'conection/conection.php';
	$s='';
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){		
		$id = $_REQUEST['id'];
		$rec = $ser->prepare("SELECT * FROM category WHERE id='$id'");
		$rec->execute();
		while($result=$rec->fetch()){
			$name = $result['name'];
			$active = $result['is_active'];
		}
	}
	if(isset($_POST['submit'])){
		$rt= $ser->prepare("UPDATE category SET name=:name,is_active=:active WHERE id=$id" );
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
			<h3>Update Category</h3>
		</div>	
	</div>
	<form method="post" class="create-form" enctype="multipart/form-data">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Category Name :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="name" value="<?php echo $name ;?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Is Active :</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="active">
									<option value="0" selected="<? echo $active ?>">
										No
									</option>
									<option value="1" selected="<? echo $active ?>">
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
							<input type="submit" name="submit" value="Update" class="btn btn-primary">
							<input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>