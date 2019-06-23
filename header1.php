<!DOCTYPE html>
<html lang="en">
<!--=========== header================-->
<head>

<<!DOCTYPE HTML>
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
				<!-- border:1px solid red;  -->
			 <!-- } -->
			
			.modal h6{
			 background-color:#343a40;
			 color:white;
			 border-radius:5px;
			 
			
			}
			.modal-lg {
           		 max-width: 80% !important;
           		 margin-top:150px;
                  }
             .modal-sm {
				margin-top:50px;
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
				
<?php 
			function sanitizeInput($data){
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = addslashes($data);
        
        return $data;
        }
        $val_error = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$Productname = $_POST['Productname'];
		$Productunit = $_POST['Productunit'];
		$productprice = $_POST['productprice'];
		$purchasedate = $_POST['purchasedate'];
		$productdsc = $_POST['productdsc'];
		$sellingPrice = $_POST['sellingPrice'];
		$product_cat = $_POST['product_cat'];
		$manufacturer = $_POST['manufacturer'];
		//$newsletter = $_POST['newsletter'];

		//begins serverside validation



     
            //check if any of the user input field is empty 
             //validate productname field
            if (empty($Productname) ) {
                $regerror['Productname'] = "<span class='text text-danger'>required!</span>";
            }
             //validate Productunit field
            if (empty($Productunit)) {
                $regerror['Productunit'] = "<span class='text text-danger'>required!</span>";
            }
            //validate product price field
            if (empty($productprice)) {
                $regerror['productprice'] = "<span class='text text-danger'>required!</span>";
            }

            
             //validate purchsedate field
            if (empty($purchasedate)) {
                $regerror['purchasedate']= "<span class='text text-danger'>required</span>";
            }
             //validate product description field
            if (empty($productdsc)) {
                $regerror['productdsc']= "<span class='text text-danger'>required</span>";
            }

             //validate sellingPrice field
             if (empty($sellingPrice)) {
                $regerror['sellingPrice'] = "<span class='text text-danger'> required</span>";
            }
            //Validate product_cat field
             if (empty($product_cat)) {
                $regerror['product_cat']= "<span class='text text-danger'> required</span>";
            }

             //validate manufacturer field
             if (empty($manufacturer)) {
                $regerror['manufacturer'] = "<span class='text text-danger'> required</span>";
            }

           
            //sanitize the user input
            $Productname = sanitizeInput($Productname);
            $Productunit = sanitizeInput($Productunit);
            $productprice = sanitizeInput($productprice); 
            $purchasedate = sanitizeInput($purchasedate);
            $productdsc = sanitizeInput($productdsc);
            $sellingPrice = sanitizeInput($sellingPrice); 
            $product_cat = sanitizeInput($product_cat);
            $manufacturer = sanitizeInput($manufacturer);
            
            //check for empty regerror
            if(empty($regerror)){
            //create customer object  and refrence register method
				$regobj = new Customer;
				$regobj->register($stateid,$fname,$lname,$email,$password,$confirm_pswd,$dob,$city,$phone,$address);
		}

        }

?>
	<div class="container">
		  <div class="modal-body">
		<h5 class="text-success" id="alert"></h5>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form1">
			<p id="head" class="text-danger"></p>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="Productname">Product Name</label>
			      <input type="text" class="form-control" id="Pname" placeholder="Product Name" name="Productname">
			      <?php 
				  if(isset($regerror['Productname'])){
				 echo $regerror['Productname'];}?>
			    </div>
			</div>
			    <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="Productunit">Units</label>
			      <input type="number" class="form-control" id="Lname" placeholder="Productunit" name="Productunit">
			      <?php 
				  if(isset($regerror['Productunit'])){
				 echo $regerror['Productunit'];}?>
			    </div>
			</div>
			    
			  <div class="form-row mt-2">
			    <div class="form-group col-md-6">
			      <label for="productprice">Price</label>
			      <input type="number" class="form-control" id="Email" placeholder="product price" name="productprice">
			      <?php 
				  if(isset($regerror['productprice'])){
				 echo $regerror['productprice'];}?>
			    </div>
			    
			    <div class="form-group col-md-6">
			      <label for="purchasedate">purchase date</label>
			      <input type="date" class="form-control" id="purchasedate" name="purchasedate">
			      <?php 
				  if(isset($regerror['purchasedate'])){
				 echo $regerror['purchasedate'];}?>
			    </div>
			    
			  </div>
			 <div class="form-group col-md-6">
    				<label for="productdsc">Product Description</label>
    			<div class="col-sm-6">
      				<textarea type="text" class="form-control" id="productdsc" placeholder="Description" name="productdsc"><?php if(isset($_POST['productdsc'])){echo $_POST['productdsc'];} ?></textarea> 
    			</div>
          <?php 
                if(isset($regerror['productdsc'])){
                  echo $regerror['productdsc'];
                }
               ?>
  			</div>
			   
			    <div class="form-group col-md-6">
			      <label for="selling Price">selling Price</label>
			      <input type="text" class="form-control" id="City" name="sellingPrice">
			      <?php 
				  if(isset($regerror['sellingPrice'])){
				 echo $regerror['sellingPrice'];}?>
			    </div>
			  	
			    <div class="form-group col-md-6">
			      <label for="inputState">Category</label>
			      <select id="State" class="form-control" name="category">
			        <option selected>Choose...</option>
			        <?php
			        foreach ($category as $key => $value):
			      			$categoryid = $value['category_id'];
			      			$categoryname =$value['category_name'];
			      			if($_POST['category_id']==$categoryid){
			      				echo "<option value=\"$categoryid\" selected='selected'>$categoryname</option>";
			      			}else{
			      			echo "<option value=\"$category_id\">$categoryname</option>";
			      		}
			      		endforeach;?>
			        <option>...</option>
			      </select>
			      <?php 
				  if(isset($regerror['categoryid'])){
				 echo $regerror['categoryid'];}?>
			    </div>
			     <div class="form-group col-md-6">
			      <label for="inputState">Manufacturer</label>
			      <select id="State" class="form-control" name="manufacturer">
			        <option selected>Choose...</option>
			        <?php
			        foreach ($manufacturer as $key => $value):
			      			$manufacturerid = $value['manufacturer_id'];
			      			$manufacturername =$value['manufacturer_name'];
			      			if($_POST['manufacturer_id']==$manufacturerid){
			      				echo "<option value=\"$manufacturerid\" selected='selected'>$manufacturername</option>";
			      			}else{
			      			echo "<option value=\"$manufacturer_id\">$manufacturername</option>";
			      		}
			      		endforeach;?>
			        <option>...</option>
			      </select>
			      <?php 
				  if(isset($regerror['manufacturer'])){
				 echo $regerror['manufacturer'];}?>
			    </div>

			    <div class="form-group row mt-2">
    				<label class="col-sm-2  offset:4 col-form-label bg-primary text-white">Product Image</label>
    			<div class="col-sm-6">
      				<input type="file" class="form-control" id="productimg" placeholder="product name" name="productimg" value="<?php if(isset($_POST['productimg'])){
                echo $_POST['productimg'];
              } ?>">
              
    			</div>
          <?php
              if(isset($regerror['productimg'])){
                echo $regerror['productimg'];
                }
              ?>
  			</div>
			    
			</div>
			      
			  <div class="row">
			  <button type="submit" class="btn btn-danger" id="Signin">Sign up</button>
			</div>
		</form>
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
		
<?php
include_once('footer.php');

?>