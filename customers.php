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
			
			 <!-- font awsome -->
			 <link rel="stylesheet" href="fontawesome/css/all.css">

			
			
			 <!-- website title -->
			 <title>Customer</title>
			 
			 <style type="text/css" rel= stylesheet>
			.thead-design{
			  color:white;
			  background-color:#343a40;
			  font-size:15px;
			  padding:0;!important; 
			}
			 </style>
			
		</head>
		<body>
		
		
		<div class="container mt-2">
			<div class="mt-3">
				<h2 class="bg-dark text-white">Customers Table<h2>
			</div>
			  
					<table class="table table-bordered">
					  <thead  class="thead-design">
						<tr>
						  <th scope="col">Id</th>
						  <th scope="col">First Name</th>
						  <th scope="col">Last Name</th>
						  <th scope="col">Email</th>
						  <th scope="col">Phone</th>
						  <th scope="col">Address</th>
						  <th scope="col">Shipping Address</th>
						  <th scope="col">Office Address</th>
						  <th scope="col">DOB</th>
						  <th scope="col">State</th>
						  <th scope="col">Action</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <th scope="row">2</th>
						  <td>Bill</td>
						  <td>Gates</td>
						  <td>Bill@gate.com</td>
						  <td>+19773998774</td>
						  <td>34, park lane Dc</td>
						  <td>34, park lane Dc</td>
						  <td>Medina Lodge Ca.</td>
						   <td>29-12-1973</td>
						   <td>Washington</td>
						    <td style="color:red">
						    	<button type="button" class="btn btn-danger expnd" flip="Delete">
						    		<i class="fas fa-trash-alt"></i>
						    	</button>
						    </td>
						</tr>
						<tr>
						  <th scope="row">2</th>
						  <td>Tim</td>
						  <td>Cook</td>
						  <td>Tim@cook.com</td>
						  <td>+68647646734</td>
						  <td>34, park avenue NY</td>
						  <td>34, park avenue NY</td>
						  <td>4 Madison lane NY</td>
						   <td>29-12-1970</td>
						   <td>California</td>
						    <td style="color:red">
						    	<button type="button" class="btn btn-danger expnd" flip="Delete">
						    		<i class="fas fa-trash-alt"></i>
						    	</button>
						    </td>
						</tr>
						<tr>
						  <th scope="row">1</th>
						  <td>Larry</td>
						  <td>Page</td>
						  <td>Larry@page.com</td>
						  <td>+09870987667</td>
						  <td>34, hill side NY</td>
						  <td>34, hill side NY</td>
						  <td>4 obama lane NY.</td>
						   <td>29-12-1980</td>
						   <td>NY</td>
						    <td style="color:red">
						    	<button type="button" class="btn btn-danger expnd" flip="Delete">
						    		<i class="fas fa-trash-alt"></i>
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
			$(document).ready(function(){
				$(.table tbody).on()
			
			});
		</script>
				<!-- Popper -->
			<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
				<!--bootsrap.js)-->
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
			</body>	
	</html>