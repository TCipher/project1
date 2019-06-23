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
			 <title>Order</title>
			 <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
			<body>
				<div class="container mt-5">
					<h2>Orders</h2>
						<table class="table thbg table-bordered">
					  		<thead class="thead-design">
						    <tr>
						      <th scope="col">Order Id</th>
						      <th scope="col">Category</th>
						      <th scope="col">Order Item</th>
						      <th scope="col">Price</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Customer Name</th>
						      <th scope="col"> order Date</th>
						      <th scope="col">Status</th>
						      <th scope="col">Total Price</th>
						    </tr>
						  	</thead>
						  	<tbody>
						  		
						    <tr>
						      <th scope="row">1</th>
						      <td>Computers</td>
						      <td>Hp Pro Book</td>
						      <td>50000</td>
						      <td>1</td>
						      <td>Otto</td>
						      <td>22-12-2019</td>
						      <td id="flip1">
						      	<button  type="button" class="btn btn-warning expnd" flip="Pending">
						      		<i class="far fa-pause-circle  text-white"></i>
						      	</button>
						  		</td>
						       <td>50000</td>
						    </tr>
						    <tr>
						      <th scope="row">2</th>
						      <td>Computers</td>
						      <td>Hp Pro Book</td>
						      <td>50000</td>
						      <td>2</td>
						      <td>Otto</td>
						      <td>22-12-2019</td>
						       <td id="flip2">
						      	<button   type="button" class="btn btn-success expnd" flip="Approved">
						      		<i class="far fa-check-circle  text-white"></i>
						      	</button>
						  		</td>
						       <td>50000</td>
						    </tr>
						   
						  </tbody>
						</table>
<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.js"></script>
				<!--external javascript-->
		<script rel="text/javascript" src="script1.js"></script>
				<!-- Popper -->
			<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
				<!--bootsrap.js)-->
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		</div>
			</body>	
	</html>
</body>
</html>