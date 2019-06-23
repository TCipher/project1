<?php
include_once('header.php');
include_once('Cipherclass.php');
?>
<?php
$regerror = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

	$emailaddress = $_POST['email'];
	$password = $_POST['password'];

	//validate
	if(empty($emailaddress)){
		$regerror['email'] = "<span class='text-danger'>Invalid emial address</span>";
	}else if(!FILTER_VAR($emailaddress,FILTER_VALIDATE_EMAIL)){
		$reg_error['emaila'] = "<span class='text-danger'>Invalid email</span>";}

	if(empty($password)){
		$regerror['password'] = "<span class='text-danger'>Please enter a valid password</span>";
	}else if (strlen($password)< 8){
	 $reg_error['password'] =  "<span class='text-danger'>invalid, password must be more than 7 characters</span>";}

	//check if there is no validation error
	//then proceed to refrence/call the login method
	if(count($regerror)==0){
		$cusobj = new Customer;
		$output = $cusobj->login($emailaddress,$password);
	}

}

?>
<style type="text/css">
	
	
</style>
	
	<div class="container">
		<?php
			$countreg_error = count($regerror);
	if($countreg_error > 0){
		?>
		<div class="alert alert-danger">
		<?php
			foreach ($regerror as $key => $value) {
			 	echo "<div>".$value."</div>";
			 }
			 } 
		?>

	 <div class="row mt-5">
	<div><h5>Sign In</h5></div>
		<?php
			if(isset($output)){
				echo $output;
			}
			?>
	</div>
	<div class="mt-3">
		<h5 class="text-success" id="alert"></h5>
		<form method="Post" action="#" id="#form1">
			<p id="head" class="text-danger"></p>
			  <div class="form-row">
			    <div class="form-group col-md-5">
			      <label for="inputEmail4">Email</label>
			      <input type="text" class="form-control" id="Email" placeholder="Email" name="email"  value="<?php if(isset($_POST['emailaddress'])){
			      	echo $_POST['emailaddress'];} ?>">
			    </div>
			    			

			    <div class=" form-group bg-primary text-white col-md-5 offset-1 text-center mb-5">
					<img src="icons/facebook2.png" alt="facebook">
					<a href="" class="nounderline">Sign up with FACEBOOK</a>
				</div>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-5">
			      <label for="inputEmail4">Pasword</label>
			      <input type="password" class="form-control" id="Password" placeholder="Pasword" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
			      <span ><a href="" class="nounderline text-warning">Forget your password?</a></span>
			    </div>
			    
			    <div class=" form-group bg-light text-white col-md-5 offset-1 text-center mb-5">
					<img src="icons/google.png" alt="google">
					<a href="" class="nounderline text-dark">Sign up with Google</a>
				</div>
			  </div>
			  <div class="form-row">
			  	<div class=" form-group col-md-5">
			  <button type="submit" class="btn btn-primary" id="Signin">Sign in</button>
			</div>
			<div class=" form-group bg-danger text-white col-md-5 offset-1 text-center mb-5">
					<img src="icons/user.png" alt="google">
					<a href="" class="nounderline text-white">Create A new Accout</a>
				</div>
			</div>
		</div>
		</form>
	</div>

	</div>
<?php
include('footer.php');
?>