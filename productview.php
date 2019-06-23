<?php
$pagetitle = "Add Product";
include_once('adminheader.php');
include_once('adminnavbar.php');
include_once('admininfo.php'); 
?>

<div class="wrapper d-flex">
			<!--sidebar-->
<style type="text/css">
	.display{
		font-size:12px;
	}

</style>
<?php
include_once('sidebar.php'); 
?>
<div>
<?php
$productobj = new Products();

$products = $productobj->fetchAllProducts();

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 mt-4 d-flex justify-content-end">
			<form class="form-inline">
		      <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
		    </form>
			<a href ="" class="btn btn-info expnd mr-2" flip="Manage Product"><i class="fas fa-tasks text-white"></i></i></a>

			<a href ="addproduct.php" class="btn btn-info expnd" flip="New Product"><i class="fas fa-plus text-white"></i></a>

		</div>
		
			<table class="table table-bordered table-striped table-hover bg-info ">
				<thead class="thead-design text-white">
					<th>#</th>
					<th>Thumbnail</th>
					<th>Product Name</th>
					<th>(&#8358)price</th>
					<th>Quanity </th>
					<th>Description</th>
					<th>Category</th>
					<th>Date Purchased</th>
					<th>Manufacturer</th>
				</thead>
				<tbody>
					<?php
					 $Sn_counter = 0;
					foreach ($products as $key => $value) {
						?>

						<tr>
							<td><?php echo ++$Sn_counter; ?></td>
							<td><?php echo "<img  class='img-thumbnail img-fluid' src=".$value['product_image']." alt='product image' style='width:50px; height:50px;'>"; ?></td>
							<td><?php echo $value['Product_name']; ?></td>
							<td>&#8358;<?php echo number_format($value['Product_price'],2); ?></td>
							<td><?php echo $value['Product_unit']; ?></td>
							<td><?php echo $value['Product_dsc']; ?></td>
							<td><?php echo $value['category_name']; ?></td>
							<td><?php echo $value['date_of_purchase']; ?></td>
							<td><?php echo $value['manufacturer_name']; ?></td>
							




						</tr>
					<?php	
					}

					?>

				</tbody>
			</table>
			
			
</div>

</div>
</div>


</div>
</div>
</div>

<?php
include_once('adminfooter.php');

?>