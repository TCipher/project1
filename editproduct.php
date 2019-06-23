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
?>
<div>
<?php 

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
		$manufacturerid = $_POST['manufacturerid'];
		 $userid = $_REQUEST['productid'];//from query string
            

		
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
             if (empty($sellingprice)) {
                $regerror['sellingprice'] = "<span class='text text-danger'> required</span>";
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
            $userid = sanitizeInput($productid);//from query string
            
            //check for empty regerror
             if(($regerror)==0);{

      $productobj = new Products;
      $output = $productobj->updateProduct($manufacturerid,$productname,$productunit,$productprice,$productdsc,$sellingprice,$categoryid,$productid);

     }
    }

    ?>
	<div class="container mt-2">
		<h4>MANAGE PRODUCT</h4>
         <?php
			if(isset($_GET['productid'])){

				//create user object
			$product_info_obj = new Products;
			$productinfo = $product_info_obj->fetchProductDetails($_GET['productid']);

		}
			 ?>
		<div class="mt-2">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?productid=".$productinfo['productid']; ?>" enctype="multipart/form-data">
				
			<div class="form-group row">
    				<label class="col-sm-2  offset:4 col-form-label bg-primary text-white">Product Name</label>
    			<div class="col-sm-6">
      				<input type="text" class="form-control" id="productname" placeholder="product name" name="productname" value="<?php if(isset($_POST['productname'])){
                echo $_POST['productname'];
              } ?>">
    			</div>
          <?php 
            if(isset($regerror['productname'])){
             echo $regerror['productname'];
            }
          ?>
  			</div>
  			<div class="form-group row mt-2">
    				<label class="col-sm-2  offset:4 col-form-label bg-primary text-white">Quantity</label>
    			<div class="col-sm-6">
      				<input type="text" class="form-control" id="productunit" placeholder="enter quantity" name="productunit" value="<?php if(isset($_POST['productunit'])){
                echo $_POST['productunit'];
              } ?>">
    			</div>
          <?php 
            if(isset($regerror['productunit'])){
             echo $regerror['productunit'];
            }
          ?>
  			</div>
  			<div class="form-group row mt-2">
    				<label class="col-sm-2  offset:4 col-form-label bg-primary text-white">Unit Price</label>
    			<div class="col-sm-6">
      				<input type="text" class="form-control" id="productprice" placeholder="enter price" name="productprice" value="<?php if(isset($_POST['productprice'])){
                echo $_POST['productprice'];
              } ?>">
    			</div>
          <?php 
            if(isset($regerror['productprice'])){
             echo $regerror['productprice'];
            }
          ?>
  			</div>
  			<div class="form-group row mt-2">
    				<label class="col-sm-2  offset:4 col-form-label bg-primary text-white">Purchase Date</label>
    			<div class="col-sm-6">
      				<input type="text" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d");?>" readonly>
  
    			</div>
         
  			</div>
  			
  			<div class="form-group row mt-2">
    				<label class="col-sm-2  offset:4 col-form-label bg-primary text-white">Product Description</label>
    			<div class="col-sm-6">
      				<textarea type="text" class="form-control" id="productdsc" placeholder="Description" name="Product_dsc"><?php if(isset($_POST['productdsc'])){echo $_POST['productdsc'];} ?></textarea> 
    			</div>
          <?php 
                if(isset($regerror['productdsc'])){
                  echo $regerror['productdsc'];
                }
               ?>
  			</div>

  			<div class="form-group row mt-2">
    				<label class="col-sm-2  offset:4 col-form-label bg-primary text-white">Selling Price</label>
    			<div class="col-sm-6">
      				<input type="text" class="form-control" id="sellingprice" placeholder="selling price" name="sellingprice" value="<?php if(isset($_POST['sellingprice'])){
                echo $_POST['sellingprice'];
              } ?>">
    			</div>
          <?php
              if(isset($regerror['sellingprice'])){
                echo $regerror['sellingprice'];
              }
               ?>
  			</div>
  			<?php

				$catgobject = new Products;

				$category = $catgobject->getcategory();?>
  			<div class="form-group row mt-2">	
				  <label class="col-sm-2 offset:4 col-form-label bg-primary text-white">Category</label>
				<div class="col-sm-6">
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

			</div>
			<?php

				$manuobject = new Products;

				$manufacturer = $manuobject->getmanufacturers();?>
				<div class="form-group row mt-2">	
				  <label class="col-sm-2 offset:4 col-form-label bg-primary text-white">Manufacturer</label>
				<div class="col-sm-6">
					 <select id="manufacturerid" class="form-control" name="manufacturerid">
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
			     
			  <div class="form-group mt-2">
			  	<div class="col-md-3">
			  	<input type="submit" name="submit" id="submit" value="Add Product" class="btn btn-primary">
			</div>
			</div>
				
			</form>
		</div>
	</div>

</div>

<?php include_once('adminfooter.php');?>

