<?php
	require 'conection/conection.php';
	$s='';
	$select = $ser->prepare("SELECT id,name FROM page");
	$select->execute();
    if(isset($_POST['submit'])){
		$rt= $ser->prepare("INSERT INTO menu(name,page_id,is_active,display_order) VALUES(:name,:page_id,:active,:order)" );
		$rt->bindParam('name', $_POST['name']);
		$rt->bindParam('page_id', $_POST['page_id']);
		$rt->bindParam('active', $_POST['is_active']);
		$rt->bindParam('order', $_POST['order']);
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
			<h3>Add Menu</h3>
		</div>	
	</div>
	<form method="post" class="create-form">
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
								<b>Page Id:</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="page_id">
									<option>Select</option>
									<?php while($result=$select->fetch()):?> 
										<option value="<?php echo $result['id']; ?>">
											<?php echo $result['name']; ?>
										</option>
									<?php endwhile;?>
								</select>
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
								<select name="is_active">
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
							<div class="col-md-4 text-right">
								<b>Display Order :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="number" name="order">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<input type="submit" name="submit" value="Add" class="btn btn-primary">
							<input type="button" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>