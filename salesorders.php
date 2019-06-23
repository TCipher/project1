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
			
				<!-- external css -->
			<link rel="stylesheet" href="css/style.css" type="text/css"> 
			
			 <!-- font awsome -->
			 <link rel="stylesheet" href="fontawesome/css/all.css">

			 <!--external fonts-->
			<link href="https://fonts.googleapis.com/css?family=Lora|Roboto|Roboto+Slab&display=swap"
			 rel="stylesheet">
			 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
			
			 
			
			 <!-- website title -->
			 <title>Cipher soft business Mangement</title>
			 
			 <style type="text/css" rel= stylesheet>
			

			 </style>
			
		</head>
		<body>
			<div class="container mt-2 " style="text-align:left">
				<div class="card">
				  <div class="card-header">
				    <h3><i class="fas fa-shopping-cart"></i>OFFLINE ORDER</h3>
				  </div>
				  <div class="card-body ml-5 text-primary">
						<form>
						  <div class="form-group row ">
						    <label class="col-sm-2">Customer Name</label>
						    <div class="col-sm-8">

						    	<!-- Button trigger modal -->
						    <button type="button" class="btn btn-danger btn-cust1"data-toggle="modal" data-target="#exampleModal">
								<i class="fas fa-plus" data-toggle="tooltip" 
									data-placement="bottom" title="new customer">	
						    	</i>
							</button>
							

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        ...
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div>
						    </div>
						  </div>
						</div>
						      <select id="cust_nam" class="col-sm-8">
								<option value="">customer</option>
								
							</select>
							<button type="button" class="btn btn-danger btn-cust2">
								<i class="fas fa-search-location" data-toggle="tooltip" 
								    data-placement="bottom" title="search">	
								</i>
							</button>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label  class="col-sm-2">Order Id.</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label  class="col-sm-2">Order Date</label>
						    <div class="col-sm-4">
						      <input type="Date" class="form-control">
						    </div>
						  </div>
						  <div class="container mt-2">
						<table class="table bg-success table-bordered">
						<thead>
							<th scope="col">Id</th>
							<th scope="col">Category</th>
							<th scope="col">Order Item</th>
							<th scope="col">Price</th>
							<th scope="col">quantity</th>
							<th scope="col">total price</th>
						</thead>
						</table>
						</div>
						<div class="mt-3">
					 	<button type="button" class="btn btn-success expnd" flip="Add"><i class="fas fa-plus text-white"></i></button>
						   <button type="button" class="btn btn-danger expnd" flip="Remove"><i class="fas fa-trash text-white"></i></button>
						</div>
						<div class="d-flex justify-content-center">
							<button  type="submit" class=" btn btn-success">Proceed to check Out
							</button>
						</div>
						</form>
					</div>
				</div>  	
			</div>

				    

		</script>
					<!--jquery-->
			<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

				<script rel="text/javascript" src="script1.js"></script>
				<!-- Popper -->
			<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
				<!--bootsrap.js)-->
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

			</body>	
	</html>