        <!-- Button trigger modal -->
          <button class="btn btn-danger expnd" data-toggle="modal" data-target="#exampleModal" flip="Add New Product"><i class="fas fa-plus text-white"></i></button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
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
      
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="Productunit">Units</label>
            <input type="number" class="form-control" id="Lname" placeholder="Productunit" name="Productunit">
            <?php 
          if(isset($regerror['Productunit'])){
         echo $regerror['Productunit'];}?>
          </div>
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>