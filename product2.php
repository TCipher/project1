<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
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
			 	
</head>
<body>

<<?php 
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
			      			if($_POST['category_id']==$categoryid){
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

</body>
</html>