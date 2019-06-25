<?php
$pagetitle = "Add Product";
include_once('adminheader.php');
include_once('adminnavbar.php');
include_once('admininfo.php'); 
?>

<div class="wrapper d-flex">
			<!--sidebar-->

<?php
include_once('sidebar.php');
include_once('adminstatus.php'); 
?>

	<?php


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$category = $_POST['category'];

			if (empty($category)) {
				
				$category_role = "<div class='text-danger'>This field is required</div>";
			}


			if (empty($category_role)) {

			// echo "Successful";

			

			$cat_obj = new Products;

			$cat_obj->addcategory($category);
		}

		}

	?>

	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-4">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

					<div class="row form-group">
						<div class="col-md">
						<label class="btn btn-primary mt-5">Product Category</label>
						<input class="form-control" type="text" name="category">
						<?php if (isset($category_role)) {
							echo $category_role;
						}   ?>
						<input class="btn btn-primary mt-4" type="submit" name="submit" value="Add Category">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
</div>

<?php
include_once('adminfooter.php');

?>