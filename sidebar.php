			<div class="">
				<!--the side admin bar-->
				<div class="sidebar">
	
					<ul class="navbar-nav bg-dark pl-4">
											<?php if(isset($_SESSION['myuserid'])){
							echo "You Logged In as ".$_SESSION['lastname'];
								}
							?>	
						<div class="picture_frame">
							<img src="images/avater1.png" alt="avater">

						<div class="fix"><i class="fas fa-plus fix2">
							
						</i>
													 
						</div>

						</div>

						<li class="nav-item">
							<a href="adminpage.php" class="nav-link">
								<i class="material-icons icon">dashboard</i>
								<span class="text">Dashboard</span>

							</a>

						</li>
						<span class="line"></span>

						<li class="nav-item">
							<a href="addcategory.php" class="nav-link">
								<i class="material-icons icon">category</i>
								<span class="text">Category</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<a href="productview.php" target="_parent" class="nav-link">
								<i class="material-icons icon">view_list</i>
								<span class="text">Products</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="material-icons icon">group_add</i>
								<span class="text">Customers</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="material-icons icon">shopping_cart</i>
								<span class="text">Online order</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<a href="offlineorder.html" class="nav-link">
								<i class="material-icons icon">shopping_cart</i>
								<span class="text"> Offline Order</span>
							</a>
						</li>
						<span class="line"></span>
							<span class="line"></span>												
							<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="material-icons icon">store</i>
								<span class="text">Warehouse</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="material-icons icon">storage</i>
								<span class="text">Stock</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="material-icons icon">group</i>
								<span class="text">Suppliers</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<span class="line"></span>
							<a href="store.html" class="nav-link">
								<i class="material-icons icon">weekend</i>
								<span class="text">store</span>
							</a>
						</li>
						<span class="line"></span>
						<li class="nav-item">
							<span class="line"></span>
							<a href="store.html" class="nav-link">
								<i class="material-icons icon">person</i>
								<span class="text">Log Out</span>
							</a>
						</li>
												
					</ul>
				
				</div>
				
			</div>
			<div class="container-fluid" >
