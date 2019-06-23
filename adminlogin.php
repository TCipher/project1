<!DOCTYPE html>
<html>
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
		
		 <!-- font awsome -->
		 <link rel="stylesheet" href="fontawesome/css/all.css">
		
		 <!-- website title -->
		 <title>Cipher soft business Mangement</title>
		 <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
			</head>

<?php
$regerror = array();
include_once('Cipherclass.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

	$emailaddress = $_POST['emailaddress'];
	$password = $_POST['password'];
	

	//validate
	if(empty($emailaddress)){
		$regerror['emailaddress'] = "<span class='text-danger'>Invalid emial address</span>";
	}else if(!FILTER_VAR($emailaddress,FILTER_VALIDATE_EMAIL)){
		$reg_error['emailaddress'] = "<span class='text-danger'>Invalid email</span>";
	}else{
		$emailaddress = Customer::sanitizeInput($emailaddress);
	}

	if(empty($password)){
		$regerror['password'] = "<span class='text-danger'>password required</span>";
	}else if (strlen($password)< 8){
	 $reg_error['password'] =  "<span class='text-danger'>invalid, password must be more than 7 characters</span>";
	}else{
		$password = Customer::sanitizeInput($password);
	}

	//check if there is no validation error
	//then proceed to refrence/call the login method
	if(count($regerror)==0){
		$userobj = new Customer;
		$output = $userobj->adminlogin($emailaddress,$password);

	}

}

?>
			<body style="background-color:#007bff" class="text-white">
				<h1 class="text-center mt-3">ADMIN ONLY </h1>
					
				<div class="container" style="margin-top:60px;">
					<div class="card  mx-auto " style="width: 15rem; background-color:darkblue ">
						  <img class=" mx-auto"  src="images/lock.png" alt="...">
						 

						  <div class="card-body">
						    <h4 style="text-align:center;">Admin</h4>
						    <?php
						if(isset($output)){
							echo $output;
							
						}
						
					?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			    <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" name="emailaddress" placeholder="Enter email" value="<?php if(isset($_POST['emailaddress'])){
			      	echo $_POST['emailaddress'];} ?>">
				    
				  	</div>
				  	<?php 
				    	if(isset($regerror['emailaddress'])){
				    		echo $regerror['emailaddress'];
				    	}

			    	?>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"name="password" value="<?php if(isset($_POST['Password'])){echo $_POST['password'];} ?>">
					  </div>
					  <?php 
					    	if(isset($regerror['password'])){
					    		echo $regerror['password'];
					    	}

			    		?>
					  <button type="submit" class="btn btn-primary">
					  	<i class= "fa fa-lock">&nbsp Login</i>
					  </button>
					</form>
				</div>
						
					</div>
						</div>
					

			 

		<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.js"></script>
		<script>
			//$(document).ready(function(){
				//$(.table tbody).on()
			
			//});
		</script>
				<!-- Popper -->
			<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
				<!--bootsrap.js)-->
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
			</body>	
	</html>