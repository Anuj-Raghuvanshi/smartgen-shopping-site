<?php
	require 'conection/conection.php';
	$s='';
	    if(isset($_POST['submit'])){
			$rt= $ser->prepare("INSERT INTO page(name,title,is_active,page_path) VALUES(:name,:title,:active,:page_path)" );
			$rt->bindParam('name', $_POST['name']);
			$rt->bindParam('title', $_POST['title']);
			$rt->bindParam('active', $_POST['is_active']);
			$rt->bindParam('page_path', $_POST['page_path']);
			$rt->execute();
			$s='ok';
			header('Location:view.php');
		}
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Add Page</h3>
		</div>	
	</div>
	<form method="post" class="create-form">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Page Name :</b>
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
								<b>Title :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="title">
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
								<b>Path :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="page_path">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<input type="submit" name="submit" value="Save" class="btn btn-primary">
							<input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php echo $s; ?>
</div>