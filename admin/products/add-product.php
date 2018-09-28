<?php
	require 'conection/conection.php';
	$s='';
	$select = $ser->prepare("SELECT name FROM category");
	$select->execute();
	if(isset($_POST['submit'])){
		if($_FILES['file']['error'] > 0){
			$img_err="choose a file";
			$f=1;
		}
		if($_FILES['file']['error'] == 0){
			$target_path="../img/";
			$target_path=$target_path.basename($_FILES['file']['name']);
			$file_path="../img/".$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'],$target_path);
			$path=$file_path;
			$f=0;
		}
	    if($f != 1){
			$rt= $ser->prepare("INSERT INTO Products(category,modal,img,spes,price,shiping_cost,is_avilabel,company) VALUES(:category,:modal,:img,:spes,:price,:shiping_cost,:is_avilabel,:company)" );
			$rt->bindParam('category', $_POST['category']);
			$rt->bindParam('is_avilabel', $_POST['is_avilabel']);
			$rt->bindParam('img', $path);
			$rt->bindParam('spes', $s);
			$rt->bindParam('company', $_POST['company']);
			$rt->bindParam('modal', $_POST['modal']);
			$rt->bindParam('price', $_POST['price']);
			$rt->bindParam('shiping_cost', $_POST['shiping_cost']);
			$rt->execute();
			$s='ok';
			header('Location:view.php');
		}
	}
	if(isset($_POST['cancel'])){
		header('Location:view.php');
	}
?>
<div>
	<div class="head">
		<div class="heading">
			<h3>Add Product</h3>
		</div>	
	</div>
	<form method="post" class="create-form" enctype="multipart/form-data">
		<table class="table table-bordered tabel-padding">
			<tbody>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Category</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="category">
									<?php while($result=$select->fetch()):?> 
										<option>
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
								<b>Modal :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="modal">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Company :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="text" name="company">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Image :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="file" name="file">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Price :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="number" name="price">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Shipping :</b>
							</div>
							<div class="col-md-8 text-left">
								<input type="number" name="shiping_cost">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-12">
							<div class="col-md-4 text-right">
								<b>Is Avilabel :</b>
							</div>
							<div class="col-md-8 text-left">
								<select name="is_avilabel">
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