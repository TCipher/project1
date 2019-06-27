<?php
ob_start(); 
session_start();
include_once('indexheader.php');
include_once('Cipherclass.php');
$pagetitle = "Home";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
		<!--meta tags-->
		<meta name="charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="keyword" content="product sale, phones, tablets, laptops, desktops, accessories, online phone order, software order,
		computer accessories order,phones affordable">
		<meta name="description" content="an online elctronic store where people can buy directly or place orders">
		<meta name="author" content="Ndefo Tochukwu">

		<!-- bootsrap -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

		<!--external style sheet-->
		<link type="text/css" rel="stylesheet" href="css/mystyle.css">
		<!-- fontawsoe -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">				
		<!--page title -->
		<title><?php echo $pagetitle;?></title>

</head>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		   <a class="navbar-brand" href="#">Cipher Store</a>
		   <button class="navbar-toggler" type="button" data-toggle="collapse" 	data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	  		</button>
	  		<div class="collapse navbar-collapse" id="navbarText">
				<ul class=" nav navbar-nav">
		  		<li class="nav-item active">
					 <a class="nav-link" href="#">
					  	<i class="fas fa-home"></i>
					   	Home <span class="sr-only">(current)</span>
					</a>
			 	 </li>
			  
			  	<!--instantiate the product class and  create object refrencing the fetch category method-->
			  	<?php
			  		$prodobj = new Products;
			  		$catobj = $prodobj->fetchCategory();?>
					<div class="input-container col-sm">
			              <div>
							<select id="catid" name="catid" style="height:36px;">
								<option value="">All</option>
								<?php
								//looping through using foreach
									foreach ($catobj as $key => $value) {
										$catid = $value['category_id'];
										$catname = $value['category_name'];
										if ($_POST['catid']==$catid){

											echo "<option value=\"$catid\" selected = 'selected'>$catname</option>";
										}else{
										echo "<option value=\"$catid\">$catname</option>";
									}
								}
								?>

							</select>
						  </div>  							
						<input  type="text" name="searchbtn" class="col-sm-12">
						 <a href="#" id="serch_btn"><i class="fas fa-search icon"></i></a>
					</div>
		</div>	
		<ul class="navbar-nav navbar-right">
			<li class="nav-item">
				<a  href="login.php" class="nav-link">
				<i class="fas fa-user"></i>&nbspSigin</a>
		   </li>
		   <li class="nav-item">
				<a  href="register.php" class="nav-link">
				<i class="fas fa-user"></i>&nbspRegister</a>
		   </li>
		  <li class="nav-item">
				<a  href="logout.php" class="nav-link">
				<i class="fas fa-user"></i>&nbspLogout</a>
		   </li>
		  <li class="nav-item">
		  	<a  href="#" class="nav-link">
		  		<i class="fas fa-shopping-cart"></i>
				Cart<span class="badge">3</span></a>
		  </li>		  
		</ul>
		<div>
			<span class="badge badge-pills text-light">
							<?php if(isset($_SESSION['myuserid'])){
							echo $_SESSION['lastname'];
								}
							?>					
				</span>
		</div>
		</nav>
<body>