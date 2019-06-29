<?php
include_once('Cipherclass.php');
//greate object of product class
$prodobj = new Products;

if(isset($_POST['mycatid'])){

		$prodinfo = $prodobj->getSpecificCategory($_POST['mycatid']);
	}else{
		$prodinfo = $prodobj-> productrand();
	}

	if($prodinfo){
	foreach ($prodinfo as $key => $value) {

?>	

						<div class="col-md-3 mr-0  mt-2 d-flex justify-content-center" style="float:left;">
							<div class="card" style="width: 18rem;">
								<div class="card-header">
									<?php echo $value['Product_name']; ?>
								</div>
									<div class="card-body">
										<img src="<?php echo $value['product_image'];?>" alt="<?php echo $value['Product_name']; ?>" class="img-responsive" style="width:100px; height:100px;">
									</div>
										<div class="card-footer"style="text-align:center;">
											&#8358 <?php echo $value['Product_price']; ?>
										</div>
												<div style="text-align:center;">
													<a href="#">More</a>
												</div>
								<button class="btn btn-danger" style="float:right">AddToCart</button>
								<div class="badge">
									<?php echo $value['Product_unit'];?> <i>in stock</i>
								</div>

							</div>
							<div style="clear:both"></div>
						</div>

<?php	
		}
	}
?>