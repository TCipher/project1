<?php
	include_once('indexheader.php');
	include_once('Cipherclass.php');
?><?php
        function sanitizeInput($data){
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = addslashes($data);
        
        return $data;
        }
        $val_error = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_pswd = $_POST['confirmpassword'];
		$dob = $_POST['dob'];
		$city = $_POST['city'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$stateid = $_POST['stateid'];
		//$newsletter = $_POST['newsletter'];

		//begins serverside validation



     
            //check if any of the user input field is empty 
             //validate firstname field
            if (empty($fname) ) {
                $regerror['firstname'] = "<span class='text text-danger'>Firstname is required!</span>";
            }
             //validate lastname field
            if (empty($lname)) {
                $regerror['lastname'] = "<span class='text text-danger'>lastname is required!</span>";
            }
			//validate email field
            if (empty($email)) {
                $regerror['email'] = "<span class='text text-danger'>Email Address is required!</span>";
            }  
            elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                $regerror['email'] = "<span class='text text-danger'>Invalid Email Address</span>";
            }

             //validate password field
            if (empty($password)) {
                $regerror['password'] = "<span class='text text-danger'>Password is required!</span>";
            }
            elseif (strlen($password) < 8) {
                $regerror['password'] = "<span class='text text-danger'>Your password is less than 8 characters!</span>";
            }

			//Validate confirm password
            if(empty($confirm_pswd)) {
              $regerror['confirmpassword'] = "<span class='text text-danger'>Password is required!</span>";
            }
            elseif (strlen($confirm_pswd) < 8) {
               $regerror['confirmpassword'] = "<span class='text text-danger'>Your password doesnt match</span>";
            }

             //validate address field
            if (empty($address)) {
                $regerror['address']= "<span class='text text-danger'>Address required</span>";
            }

             //validate phone field
             if (empty($phone)) {
                $regerror['phone'] = "<span class='text text-danger'>phone number required</span>";
            }
            //Validate date of birth field
             if (empty($dob)) {
                $regerror['dob']= "<span class='text text-danger'>date of birth required</span>";
            }

             //validate city field
             if (empty($city)) {
                $regerror['city'] = "<span class='text text-danger'>City required</span>";
            }
            //validate state field
             if (empty($stateid)) {
                $regerror['stateid'] = "<span class='text text-danger'>Select a state!</span>";
            }
              //   if (empty($newsletter)) {
                //$regerror['newsletter'] = "<span class='text text-danger'>Newsletter required</span>";
            //}


           
            //sanitize the user input
            $fname = sanitizeInput($fname);
            $lname = sanitizeInput($lname);
            $email = sanitizeInput($email); 
            $password = sanitizeInput($password);
            $confirm_pswd = sanitizeInput($confirm_pswd);
            $address = sanitizeInput($address); 
            $phone = sanitizeInput($phone);
            $dob = sanitizeInput($dob);
            $city = sanitizeInput($city); 
            $stateid = sanitizeInput($stateid);
            //$newsletter = sanitizeInput($newsletter);

            //check for empty regerror
            if(empty($regerror)){
            //create customer object  and refrence register method
				$regobj = new Customer;
				$regobj->register($stateid,$fname,$lname,$email,$password,$confirm_pswd,$dob,$city,$phone,$address);
		}

        }

?>
	<div class="container">

	 <div class="row mt-5">
		<div class="col-md-4 text-danger"><h5>New Account</h5>

		</div>
		<div class="bg-primary text-white col-md-3 offset-1">
		<img src="icons/facebook2.png" alt="facebook">
		<span class="ml-5"><a href="" class="nounderline">Sign up with FACEBOOK</a></span>
	</div>
		<div class="bg-light col-md-3 offset-1">
		<img src="icons/google.png" alt="google">
		<span class="ml-5"><a href="" class="nounderline text-dark">Sign up with Google</a></span>
	</div>

	</div>
	<div class="mt-3">
		<h5 class="text-success" id="alert"></h5>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form1">
			<p id="head" class="text-danger"></p>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputFname">First Name</label>
			      <input type="text" class="form-control" id="Fname" placeholder="First Name" name="firstname">
			      <?php 
				  if(isset($regerror['firstname'])){
				 echo $regerror['firstname'];}?>
			    </div>
			    
			    <div class="form-group col-md-6">
			      <label for="inputPassword4">Last Name</label>
			      <input type="text" class="form-control" id="Lname" placeholder="Last Name" name="lastname">
			      <?php 
				  if(isset($regerror['lastname'])){
				 echo $regerror['lastname'];}?>
			    </div>
			    
			  </div>
			  <div class="form-row mt-2">
			    <div class="form-group col-md-6">
			      <label for="inputEmail4">Email</label>
			      <input type="text" class="form-control" id="Email" placeholder="Email" name="email">
			      <?php 
				  if(isset($regerror['email'])){
				 echo $regerror['email'];}?>
			    </div>
			    
			    <div class="form-group col-md-6">
			      <label for="inputPassword4">Password</label>
			      <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
			      <?php 
				  if(isset($regerror['password'])){
				 echo $regerror['password'];}?>
			    </div>
			    
			  </div>
			  <div class="form-row">
			  	<div class="form-group col-md-6">
			      <label for="inputPassword4">Confirm Password</label>
			      <input type="password" class="form-control" id="Password" placeholder="Password" name="confirmpassword">
			       <?php 
				  if(isset($regerror['confirmpassword'])){
				 echo $regerror['confirmpassword'];}?>
			    </div>
			   
			  
			  <div class="form-group col-md-6">
			  	<label>DOB</label>
			  	<input type="date" class="form-control" id="dob" name="dob">
			  	<?php 
				  if(isset($regerror['dob'])){
				 echo $regerror['dob'];}?>
				</div>
			  </div>
			  	
			  	<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputCity">City</label>
			      <input type="text" class="form-control" id="City" name="city">
			      <?php 
				  if(isset($regerror['city'])){
				 echo $regerror['city'];}?>
			    </div>
			    
			    <div class="form-group col-md-6">
			    <label for="inputPhone">Phone</label>
			    <input type="text" class="form-control" id="Phone" placeholder="+234"name="phone">
			     <?php 
				  if(isset($regerror['phone'])){
				 echo $regerror['phone'];}?>
			  </div>
			 
			</div>
			<div class="row">
				<div class="form-group col-md-6">
			    <label for="inputAddress">Address</label>
			    <input type="text" class="form-control" id="Address" placeholder="1234 Main St" name="address">
			    <?php 
				  if(isset($regerror['address'])){
				 echo $regerror['address'];}?>
			  </div>
			  <?php
				$stateobject = new Customer;

				$states = $stateobject->getstates();?>
			  	
			    <div class="form-group col-md-6">
			      <label for="inputState">State</label>
			      <select id="State" class="form-control" name="stateid">
			        <option selected>Choose...</option>
			        <?php
			        foreach ($states as $key => $value):
			      			$stateid = $value['state_id'];
			      			$statename =$value['state_name'];
			      			if($_POST['stateid']==$stateid){
			      				echo "<option value=\"$stateid\" selected='selected'>$statename</option>";
			      			}else{
			      			echo "<option value=\"$stateid\">$statename</option>";
			      		}
			      		endforeach;?>
			        <option>...</option>
			      </select>
			      <?php 
				  if(isset($regerror['stateid'])){
				 echo $regerror['stateid'];}?>
			    </div>
			    
			</div>
			    
			  </div>
			  <div class="form-group">
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" id="gridCheck"name="newsletter">
			      <label class="form-check-label" for="gridCheck" selected="selected">
			        I want to recieve newsletter with the latest deal
			      </label>
			    </div>
			    <?php 
				  if(isset($regerror['newsletter'])){
				 echo $regerror['newsletter'];}?>
			  </div>
			  <div class="row">
			  <button type="submit" class="btn btn-danger" id="Signin">Sign up</button>
			</div>
		</form>
	</div>

	</div>


	
<?php include('footer.php');?>