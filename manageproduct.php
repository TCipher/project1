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
	a{
		text-decoration:none;
		color:white; 
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
	<div class="row mt-4">
			
		<span class="mt-2 badge bg-info text-white mr-3">PRODUCT VIEW</span>
		<form class="form-inline">
		      <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
		    </form>
			<table class="table table-bordered table-striped table-hover bg-light display ">
				<thead class="thead-design text-white">
					<th>#</th>
					<th>Thumbnail</th>
					<th>Name</th>
					<th>(&#8358)price</th>
					<th>Quanity </th>
					<th>Description</th>
					<th>Category</th>
					<th>Date Purchased</th>
					<th>Manufacturer</th>
					<th>Action</th>
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
						
							
 							<td style="color:red">
						    	<button type="button" class="btn btn-warning text-white">
						    		<a href="editproduct.php?productid=<?php echo $value['Product_id']; ?>"><i class="far fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit">
						    		</i></a>
						    	</button>
						    	<button type="button" class="btn btn-danger">
						    		<i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="bottom" 	title="Delete">	
						    		</i>
						    	</button>
						    </td>



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