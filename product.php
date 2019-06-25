<!DOCTYPE HTML>
	<html lang="eng">
		<!-- head section -->
		<head>
				<!-- <meta tags -->
			<meta name="charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
			<meta name="keywords" content="customer management, Business Management, Inventory management,sales mangement,staff management,business solution,customer analysis, business website">
			<meta name="description" content="a business management web application for managing customers and other business activities ">
			<meta name="author" content="ndefo tochukwu">
			
			<!-- bootstrap link -->
			<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
			
				
			 <link rel="stylesheet" href="css/style.css" type="text/css">

			 <link type="text/css" rel="stylesheet" href="css/animate.css">
			
			 <!-- font awsome -->
			 <link rel="stylesheet" href="fontawesome/css/all.css">
			
			 <!-- website title -->
			 <title>Cipher soft business Mangement</title>
			 
			 <style type="text/css" rel= stylesheet>
			 <!-- div{ -->
				<!-- border:1px
			
			.modal h6{
			 background-color:#343a40;
			 color:white;
			 border-radius:5px;
			 
			
			}
			.modal-lg {
           		 max-width: 60% !important;
           		 margin-top:150px;
                  }
             .modal-sm {
				margin-top:30px;
				padding:0px;
                  }
			 </style>
			
		</head>
		<body>
		
		<div class="mt-5 d-flex justify-content-around mr-5">
			<form class="form-inline my-2 my-lg-0 pr-5 ">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
		    </form>


			<button class="btn btn-danger expnd" data-toggle="modal" data-target="#exampleModal" flip="Add New Product"><i class="fas fa-plus text-white"></i></button>
			<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title text-danger" id="exampleModalLabel">Add A New Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
							</div>
						
<?php 
include_once('Cipherclass.php');
function sanitizeInput($data){
$data = trim($data);
$data = htmlspecialchars($data);
$data = addslashes($data);

return $data;
}
$regerror = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$productname = $_POST['productname'];
		$productunit = $_POST['productunit'];
		$productprice = $_POST['productprice'];
		$productdsc = $_POST['productdsc'];
		$sellingprice = $_POST['sellingprice'];
		$categoryid = $_POST['categoryid'];
		$purchasedate = $_POST['purchasedate'];
		$manufacturerid = $_POST['manufacturerid'];
		
		//begins serverside validation
     
            //check if any of the user input field is empty 
             //validate productname field
            if (empty($productname) ) {
                $regerror['productname'] = "<span class='text text-danger'>required!</span>";
            }
             //validate Productunit field
            if (empty($productunit)) {
                $regerror['productunit'] = "<span class='text text-danger'>required!</span>";
            }
            //validate product price field
            if (empty($productprice)) {
                $regerror['productprice'] = "<span class='text text-danger'>required!</span>";
            }

            
             //validate product description field
            if (empty($productdsc)) {
                $regerror['productdsc']= "<span class='text text-danger'>required</span>";
            }

             //validate sellingPrice field
             if (empty($sellingPrice)) {
                $regerror['sellingPrice'] = "<span class='text text-danger'> required</span>";
            }
            //Validate categoryid field
             if (empty($categoryid)) {
                $regerror['categoryid']= "<span class='text text-danger'> required</span>";
            }

             //validate manufacturer field
             if (empty($manufacturerid)) {
                $regerror['manufacturerid'] = "<span class='text text-danger'> required</span>";
            }

           
            //sanitize the user input
            $productname = sanitizeInput($productname);
            $productunit = sanitizeInput($productunit);
            $productprice = sanitizeInput($productprice);
            $productdsc = sanitizeInput($productdsc);
            $sellingprice = sanitizeInput($sellingprice); 
            $categoryid = sanitizeInput($categoryid);
            $manufacturerid = sanitizeInput($manufacturerid);
            
            //check for empty regerror
             if(($regerror)==0);{

    	// echo "<pre>";
    	// echo print_r($_FILES);
    	// echo "</pre>";
      $productobj = new Customer;
      $output = $productobj->addProduct($manufacturerid,$productname,$productunit,$productprice,$purchasedate,$productdsc,$sellingprice,$categoryid);
            
}
        }

?>
	<div class="container">

	 <div class="row mt-1">

	</div>
	<div>
		<h5 class="text-success" id="alert"></h5>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
			<p id="head" class="text-danger"></p>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="Productname">Product Name</label>
			      <input type="text" class="form-control" id="Pro_name" placeholder="Product Name" name="productname" value="<?php if(isset($_POST['productname'])){
			      	echo $_POST['productname'];
			      } ?>">
			      <?php 
				  if(isset($regerror['productname'])){
				 echo $regerror['productname'];}?>
			    </div>
			    
			    <div class="form-group col-md-6">
			      <label for="productunit">Units</label>
			      <input type="number" class="form-control" id="Uni_name" placeholder="Productunit" name="productunit" value="<?php if(isset($_POST['productunit'])){
			      	echo $_POST['productunit']; 
			      }?>">
			      <?php 
				  if(isset($regerror['productunit'])){
				 echo $regerror['productunit'];}?>
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="productprice">Price</label>
			      <input type="number" class="form-control" id="pro_price" placeholder="product price" name="productprice" value="<?php if(isset($_POST['productprice'])){
			      	echo $_POST['productprice'];
			      } ?>">
			      <?php 
				  if(isset($regerror['productprice'])){
				 echo $regerror['productprice'];}?>
			    </div>
			    
			    <div class="form-group col-md-6">
			      <label for="purchasedate">purchase date</label>
			      <input type="text`" class="form-control" id="purchasedate" name="purchasedate" value="<?php echo date("Y-m-d");?>" readonly>
			    </div>
			    
			  </div>
			  <div class="form-row">
			 <div class="form-group col-md-6">
    				<label for="productdsc">Product Description</label>
      				<textarea type="text" class="form-control" id="productdsc" placeholder="Description" name="productdsc"><?php if(isset($_POST['productdsc'])){echo $_POST['productdsc'];} ?></textarea> 
          <?php 
                if(isset($regerror['productdsc'])){
                  echo $regerror['productdsc'];
                }
               ?>
  			</div>

			   
			    <div class="form-group col-md-6">
			      <label for="selling Price">selling Price</label>
			      <input type="number" class="form-control" id="pro_sel" name="sellingprice" value="<?php if(isset($_POST['sellingprice'])){
			      	echo $_POST['sellingprice'];
			      } ?>">
			      <?php 
				  if(isset($regerror['sellingprice'])){
				 echo $regerror['sellingprice'];}?>
			    </div>
			</div>
			<div class="form-row">
			  	<?php

				$catgobject = new Customer;

				$category = $catgobject->getcategory();?>
			    <div class="form-group col-md-6">
			      <label for="category">Category</label>
			      <select id="prod_category" class="form-control" name="categoryid">
			        <option selected>Choose...</option>
			        <?php
			        foreach ($category as $key => $value):
			      			$categoryid = $value['category_id'];
			      			$categoryname =$value['category_name'];
			      			if($_POST['categoryid']==$categoryid){
			      				echo "<option value=\"$categoryid\" selected='selected'>$categoryname</option>";
			      			}else{
			      			echo "<option value=\"$categoryid\">$categoryname</option>";
			      		}
			      		endforeach;?>
			        <option>...</option>
			      </select>
			      <?php 
				  if(isset($regerror['categoryid'])){
				 echo $regerror['categoryid'];}?>
			    </div>
			    <?php

				$manuobject = new Customer;

				$manufacturer = $manuobject->getmanufacturers();?>
			     <div class="form-group col-md-6">
			      <label for="inputState">Manufacturer</label>
			      <select id="State" class="form-control" name="manufacturerid" id="pro_man">
			        <option selected>Choose...</option>
			        <?php
			        foreach ($manufacturer as $key => $value):
			      			$manufacturerid = $value['manufacturer_id'];
			      			$manufacturername =$value['manufacturer_name'];
			      			if($_POST['manufacturerid']==$manufacturerid){
			      				echo "<option value=\"$manufacturerid\" selected='selected'>$manufacturername</option>";
			      			}else{
			      			echo "<option value=\"$manufacturerid\">$manufacturername</option>";
			      		}
			      		endforeach;?>
			        <option>...</option>
			      </select>
			      <?php 
				  if(isset($regerror['manufacturerid'])){
				 echo $regerror['manufacturerid'];}?>
			    </div>
			</div>
				<div class="form-row">
			    <div class="form-group col-md-6">
    				<label >Product Image</label>
      				<input type="file" class="form-control" id="pro_img" placeholder="product name" name="productimg" value="<?php if(isset($_POST['productimg'])){
                echo $_POST['productimg'];
              } ?>">
              
  			</div>
			    
			</div>
			      
			  <div class="row">
			  	<div class="col-md-3">
			  	<input type="submit" name="submit" id="submit" value="Add Product" class="btn btn-primary">
			</div>
			</div>
		</form>
	</div>
								
								
					</div>


	</div>
				  </div>
				</div>
		</div>
		
		<div class="container  mt-2">
			  
					<table class="table">
					  <thead  class="thead-design">
						<tr>
						  <th scope="col">Id</th>
						  <th scope="col">Name</th>
						  <th scope="col">Price(&#8358)</th>
						  <th scope="col">Image</th>
						  <th scope="col">Details</th>
						  <th scope="col">Manufacturer</th>
						  <th scope="col">Quantity</th>
						  <th scope="col">Supplier</th>
						  <th scope="col">Date Supplied</th>
						  <th scope="col">Action</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">1</th>
						  <td>Pro Book 4540<sub>s</sub></td>
						  <td>50,000</td>
						  <td><img src="images/hpthumbnail.jpg" alt="probook"></td>
						  <td class="text-left">
						  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">View</button>

							<div class="modal fade  bd-example-modal-sm animated zoomIn" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
									<div><b>Selling Price:</b>55000</div>
									<div><b>OS:</b>Windows 8.1 64</div>
									<div><b>Memory:</b>8GB RAM, supports up to 16GB RAM</div>
									<div><b>Colours:</b>Charcoal Black</div>
									<div><b>Dimension:</b>37.5 x 26.28 x 2.34cm (non-touch).</div>
									<div><b>Weight:2.06 kg</b></div>
							    </div>
							  </div>
							</div>
						  </td>
						  <td>HP</td>
						  <td>300</td>
						  <td>Gate Group</td>
						   <td>29-12-1990</td>
						    <td style="color:red">
						    	<button type="button" class="btn btn-danger">
						    		<i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="bottom" 	title="Delete">	
						    		</i>
						    	</button>
						    	<button type="button" class="btn btn-warning">
						    		<i class="far fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit">
						    		</i>
						    	</button>
						    </td>
						</tr>
						<tr>
						  <th scope="row">2</th>
						  <td>Pro Book 4540<sub>s</sub></td>
						  <td>50,000</td>
						  <td><img src="images/hpthumbnail.jpg" alt="probook"></td>
						   <td class="text-left">
						  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">View</button>

							<div class="modal fade  bd-example-modal-sm animated zoomIn" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
									<div><b>Selling Price:</b>55000</div>
									<div><b>OS:</b>Windows 8.1 64</div>
									<div><b>Memory:</b>8GB RAM, supports up to 16GB RAM</div>
									<div><b>Colours:</b>Charcoal Black</div>
									<div><b>Dimension:</b>37.5 x 26.28 x 2.34cm (non-touch).</div>
									<div><b>Weight:2.06 kg</b></div>
							    </div>
							  </div>
							</div>
						  </td>
						  <td>HP</td>
						  <td>300</td>
						  <td>Gate Group</td>
						   <td>29-12-1990</td>
						   <td style="color:red">
						    	<button type="button" class="btn btn-danger">
						    		<i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="bottom" 	title="Delete">	
						    		</i>
						    	</button>
						    	<button type="button" class="btn btn-warning">
						    		<i class="far fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit">
						    		</i>
						    	</button>
						    </td>
						</tr>
						<tr>
						  <th scope="row">3</th>
						  <td>Pro Book 4540<sub>s</sub></td>
						  <td>50,000</td>
						  <td><img src="images/hpthumbnail.jpg" alt="probook"></td>
						  <td class="text-left">
						  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">View</button>

							<div class="modal fade  bd-example-modal-sm animated zoomIn" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
									<div><b>Selling Price:</b>55000</div>
									<div><b>OS:</b>Windows 8.1 64</div>
									<div><b>Memory:</b>8GB RAM, supports up to 16GB RAM</div>
									<div><b>Colours:</b>Charcoal Black</div>
									<div><b>Dimension:</b>37.5 x 26.28 x 2.34cm (non-touch).</div>
									<div><b>Weight:2.06 kg</b></div>
							    </div>
							  </div>
							</div>
						  </td>
						  <td>HP</td>
						  <td>300</td>
						  <td>Gate Group</td>
						  <td>29-12-1990</td>
						  <td style="color:red">
						    	<button type="button" class="btn btn-danger">
						    		<i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="bottom" 	title="Delete">	
						    		</i>
						    	</button>
						    	<button type="button" class="btn btn-warning">
						    		<i class="far fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit">
						    		</i>
						    	</button>
						    </td>
						</tr>
					  </tbody>
					</table>

		</div>
		<nav aria-label="Page navigation example">
			  <ul class="pagination">
				<li class="page-item"><a class="page-link" href="#">Previous</a></li>
				<li class="page-item"><a class="page-link" href="store.html">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">Next</a></li>
			  </ul>
			</nav>
		
		
		<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.js"></script>
		<script>
			
		</script>
				<!-- Popper -->
			<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
				<!--bootsrap.js)-->
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
			</body>	
	</html>