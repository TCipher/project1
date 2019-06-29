<?php include_once('Cipherclass.php') ?>
<div class="row">
					<div class="col-md-2" style="border-right:1px dotted #678dbf; border-bottom:1px solid #678dbf">

						<div >
					<span class="cat_sec badge badge-pills badge-info">Category</span>
					<?php
					$prodobj = new Products;
					$catobj =$prodobj->displayCategories();

					?>
					
						<?php
							foreach ($catobj as $key => $value) {
								?>
									 <ul class='none mt-3'>
									<li><a href="#" class="badge badge-pills badge-danger"><?php  echo $value['category_name']; ?></a>
										<span class="badge badge-light bg-secondary" style="font-size:12px;"><?php if(empty(['total'])){
											echo $value['total'] = "";
										}else{ 
										 echo $value['total'];
										}
										  ?>
										 	

										 </span>
									</li>
								</ul>
								<?php	
							}

							?>
					</div>
					
					<hr style="border-bottom:2px dotted red;">		
					<div>
						<?php
							$prodobj = new Products;
							$manuobj = $prodobj->fetchManufactures();
						?>
						
						 	<span class="cat_sec badge badge-pills badge-info">Manufactures</span>
						<?php
							foreach ($manuobj as $key => $value) {
								?>
									 <ul class='none mt-3'>
									<li><a href="#" class="badge badge-pills badge-danger"><?php  echo $value['manufacturer_name']; ?></a>
										<span class="badge badge-light bg-secondary" style="font-size:12px;"><?php if(empty(['total'])){
											echo $value['total'] = "";
										}else{ 
										 echo $value['total'];
										}
										  ?>
										 	

										 </span>
									</li>
								</ul>
								<?php	
							}

							?>

					</div>
					</div>
					<div class="col-md-10">
					<img src="images/computer-accessories-banner.png" alt="computer banner" class="img-responsive img-fluid" >
					<span class="prod_listing"><b>Computers</b>&nbsp <i>Laptops</i></span>
					<div class="col-md-auto">
						<?php include_once('indexdisplay.php');?></div>
					
					</div>
				</div>

<?php

include_once('indexfooter.php');
?>