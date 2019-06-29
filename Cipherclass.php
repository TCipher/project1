<?php
//creating the database configuration class
class Dbconfig{
	
//creating a member variable that will serve as database connection handler
	public $dbconect;

	//creating a member function to instiantiate connection to the database
	public function __construct(){
		//create connection by instantiating MySQLi class
		$this->dbconect = new mysqli("localhost", "root","", "cipherbm");

		//checking for the database connection
		if($this->dbconect->connect_error){
			die('connection failed '.$this->dbconect->connect_error);
		}else{
			//echo "connection successful";		
		}

	}
}
//creating class customer
class Customer{
		//member function that will act as the  object handler of DatabaseConfig
		public $dbobj; 

		//member functions
		public function __construct(){
			//create instance /object of databaseConfig class
			$this->dbobj = new DbConfig;

		}
		//function for data sanitization 
		public static function sanitizeInput($data){
	$data = trim($data);
	$data = addslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	//get state function
		public function getstates(){
			//write the query to select all roles except super admin
			$sql = "SELECT * FROM state";

			//check if the query() runs the sql statement
			if($result = $this->dbobj->dbconect->query($sql)){

				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{
				echo "Error: ".$this->dbobj->dbconect->error;
			}
			return $row;
		}
		//register function/method
		public function register($stateid,$fname,$lname,$email,$password,$confirm_pswd,$dob,$city,$phone,$address){

		$mypswd = md5($password);
		$mypswd2 = md5($confirm_pswd);


		//write the query insert into users table
		$regquery = "INSERT INTO customer(state_id,firstname,lastname,emailaddress,password,confirmpassword,dateofbirth,city,phone,address)VALUES('$stateid','$fname','$lname','$email','$mypswd','$mypswd2','$dob','$city','$phone','$address')";
		//check if the query() runs// the query runs if the data is inserted into user table
		if($this->dbobj->dbconect->query($regquery)===true){

			//get last inserted user_id

			$customerid = $this->dbobj->dbconect->insert_id;

			//create session variable
			$_SESSION['myuserid'] = $customerid;
			$_SESSION['firstname'] = $fname;
			$_SESSION['lastname'] = $lname;
			$_SESSION['email'] = $email;

			//redirect to home page
			header("Location: http://localhost/cipher/index.php");
			exit;

		}else{
			echo "Error: ".$this->dbobj->dbconect->error;
		}


	}

	//adminLogin function
		public function adminlogin($emailaddress,$password){

		//md5 the password
		//$password = md5($password);

		//write your query
    $sql = "SELECT * FROM staff WHERE staff_email = '$emailaddress' AND password ='$password' limit 1 ";

		

		//run the query
		$result = $this->dbobj->dbconect->query($sql);

		//check if number of rows return is equal to one
		if($this->dbobj->dbconect->affected_rows==1){


			//fetch the result
			$row = $result->fetch_assoc(MYSQLI_ASSOC);

			//create session variable
			$_SESSION['myuserid'] = $row['customerid'];
			$_SESSION['lastname'] = $row['staff_lname'];
			$_SESSION['firstname'] = $row['staff_fname'];
			$_SESSION['position'] = $row['staff_position'];
			//we are creating a session called profilephoto(the profilephoto is the session variable)
			//$_SESSION['profilephoto'] = $row['photograph'];


			//redirect to dashboard
			header("Location: http://localhost/cipher/adminpage.php");
			exit;
		}else{
			//display invalid login credentials
			$result ="<div class='alert  alert-danger'> Invalid Email Address or Password";
		}

		return $result;

	}
	//customer login function
	public function login($email,$password){

		//md5 the password
		$password = md5($password);

		//write your query
		$sql = "SELECT * FROM customer WHERE emailaddress = '$email' AND password = '$password' limit 1"; 
		

		//run the query
		$result = $this->dbobj->dbconect->query($sql);

		//check if number of rows return is equal to one
		if($this->dbobj->dbconect->affected_rows==1){

			//fetch the result
			$row = $result->fetch_assoc();

			//create session variable
			$_SESSION['myuserid'] = $row['customer_id'];
			$_SESSION['lastname'] = $row['lastname'];
			
			//redirect to dashboard
			header("Location: http://localhost/cipher/index.php");
			exit;
		}else{
			//display invalid login credentials
			$result ="<div class='alert  alert-danger'> Invalid Email Address or Password</div>";
		}

		return $result;

	}
}
//product class
	class Products{
		//member function that will serve as our database object handler 
		public $proddb;

				//member functions
		public function __construct(){
			//create instance /object of databaseConfig class
			$this->proddb = new DbConfig;

		}


	//function for add product
	public function addProduct($manufacturerid,$productname,$productunit,$productprice,$productdsc,$sellingprice,$categoryid){
			//check if global variable $_FILEs has a value;

		if($_FILES['productimg']['error']==0){

			//start file upload

			$filesize =$_FILES['productimg']['size'];
			$filename =$_FILES['productimg']['name'];
			$filetype =$_FILES['productimg']['type'];
			$filetempname =$_FILES['productimg']['tmp_name'];
			//specify the destination folder to upload files to
			$folder = "productimage/";

			//check the file size
			if($filesize > 2097152){
				$error[] = "File Size must be exactly or less than 2mb!";
			}
			//get the file extension
			$file_ext = explode('.',$filename); //convert string to array.
			$file_ext  = end($file_ext);//get the last elemnt of the array
			$file_ext = strtolower($file_ext);//to lowercase;

			//specify the extensions allowed
			$extensions = array('png','gif','jpeg','jpg','bmp');

			//check if the file extension is valid
			if(in_array($file_ext, $extensions) ===false){

				$error[]= "Extension not allowed!";

			}
			//change the filename
			$filename = round(microtime(true));
			$destination = $folder.$filename.".$file_ext";

			//now chwck if there is no any error and upload the file 
			if(!empty(($error))){
				var_dump($error);
			}else{
				//otherwise, upload the profile picture
				move_uploaded_file($filetempname, $destination);
				//upload photograph column in users table based on the userid
				//$myuserid =$_SESSION['myuserid'];
				//write query to insert  into the product table
				//$sql ="UPDATE users SET photograph='$destination'
				//WHERE userid = '$myuserid'";
				//run the query
				$sql = "INSERT INTO products(manufacturer_id,Product_name,Product_unit,Product_price,Product_dsc,selling_price,category_id,product_image)VALUES('$manufacturerid','$productname','$productunit','$productprice','$productdsc','$sellingprice','$categoryid','$destination')";
					

				$result =$this->proddb->dbconect->query($sql);
				
				if($this->proddb->dbconect->affected_rows == 1){

					$result = "<div class='alert alert-success'>
						".$productname." was add successfully
					</div>";

				}else{
					$result = "<div class='alert alert-danger'> You've not added any product</div>".$this->dbobj->dbconect->error;
		}
			}

		}
		 else{

		$result = "<div class='alert alert-danger'> You've not added any product</div>";


		}
		return $result;
	}
	//function for getting the manufactures from database
	public function getmanufacturers(){
			//write the query to select all manufacturers
			$sql = "SELECT * FROM manufacturers";

			//check if the query() runs the sql statement
			if($result = $this->proddb->dbconect->query($sql)){

				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{
				echo "Error: ".$this->proddb->dbconect->error;
			}
			return $row;
		}
		//function for getting the category from database
		public function getcategory(){
			//write the query to select all category
			$sql = "SELECT * FROM category";

			//check if the query() runs the sql statement
			if($result = $this->proddb->dbconect->query($sql)){

				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{
				echo "Error: ".$this->proddb->dbconect->error;
			}
			return $row;
		}
		

	public function fetchAllProducts(){

		//write the query
		$prodquerry = "SELECT * FROM products  LEFT JOIN category ON products.category_id = category.category_id  LEFT JOIN manufacturers ON manufacturers.manufacturer_id = products.manufacturer_id ";

		//run the query
		if($result = $this->proddb->dbconect->query($prodquerry)){

			$row = $result->fetch_all(MYSQLI_ASSOC);


		}else{
			echo "Oops!".$this->proddb->dbconect->error;
		}
		return $row;
	} 
	//method to get a specific product info
			public function fetchProductDetails($productid){
				//write query to fetch the user detail from users table based on the userid

				$prodsql = "SELECT * FROM products  LEFT JOIN category ON products.category_id = category.category_id  LEFT JOIN manufacturers ON manufacturers.manufacturer_id = products.manufacturer_id ";

				if($result = $this->proddb->dbconect->query($prodsql)){
					$row = $result->fetch_assoc();
				}else {
					echo "Error: ".$this->proddb->dbconect->error;
				}

				return $row;
			}

			public function updateProduct($productname,$productunit,$productprice,$productdsc,$sellingprice,$categoryid,$productid){
  	//query to update a role based on the role title
  	$sequel = "UPDATE products SET Product_name = '$productname', Product_unit = '$productunit', Product_price = '$productprice', Product_dsc = '$productdsc', selling_price = '$sellingprice', category_id ='$categoryid' WHERE Product_id = '$productid' ";
  	var_dump($sequel);
  	exit;

  				//execute myquery
				$this->proddb->dbconect->query($sequel);

				//how many rows affected //updated

				if($this->proddb->dbconect->affected_rows == 1){


					$display ="<div class='alert alert-success'> A $productname was successfully updated!</div";
					//redirect to showroles.php page
					header("Location:http://localhost/cipher/productview.php?"."display=".$display);
					exit;
				}elseif($this->proddb->dbconect->affected_rows == 0){


					$display ="<div class='alert lert-success'>no record Updated</div";
					//redirect to showroles.php page
					header("Location:http://localhost/cipher/productview.php?"."display=".$display);
					exit;
				}
				else{
					echo "Error: ".$this->proddb->dbconect->error;
	}

	}
	public function addcategory($category){
			$catquery = "INSERT INTO category(category_name)VALUES('$category')";
		 	if($this->proddb->dbconect->query($catquery)===true){

		echo  "<div class='text-success animated bounce d-flex justify-content-center text-bold'>".$category." Add Successfully!!</div>";

		
		}else{
			echo "Error ".$this->proddb->dbconect->error;
		}

	} 

	//function to fetch all the caregory from the database
	public function fetchCategory(){
		//write the query to select all users with their role title
			$catdb = "SELECT * FROM category";


			//check if the query() runs the sql statement
			if($result = $this->proddb->dbconect->query($catdb)){

				$row = $result->fetch_all(MYSQLI_ASSOC);
			}else{
				echo "Error: ".$this->proddb->dbconect->error;
			}
			return $row;
		}
		//fetch products randomly from the products table
	public function productrand(){
	//writr query
		$prodsql = "SELECT * from products order by rand() limit 12";
	
			$row= array();
		//execute the query
		$result = $this->proddb->dbconect->query($prodsql);

		if($this->proddb->dbconect->affected_rows > 0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}
		else{
		//	echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div>No Record Found</div>";
		}
		return $row;
	}
	//fetch 12 product randomly from users table
	public function getSpecificCategory($category){
	//writr query
		$sql = "SELECT products.*, category.* FROM products LEFT JOIN category ON products.category_id=category.category_id WHERE category.category_id='$category' order by category.category_id limit 12";

				$row= array();

				//execute the query
		$result = $this->proddb->dbconect->query($sql);

		if($this->proddb->dbconect->affected_rows>0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{
		//	echo "Error: ".$this->dbobj->dbcon->error;
			echo "<div class='alert alert-info'>No Record Found</div>";
		}
		return $row;
	}

	public function productpage($limit, $offset){

		$pagesql = "SELECT  * FROM products LEFT JOIN category ON products.category_id = category.category_id LEFT JOIN manufacturers ON manufacturers.manufacturer_id = products.manufacturer_id limit   $limit offset $offset";

		if($result = $this->proddb->dbconect->query($pagesql)){

			$row = $result->fetch_all(MYSQLI_ASSOC);

		}else{
			echo "Oops!".$this->proddb->dbconect->error;
		}
		return $row;
	} 

	//function to display the manufactures and quantity of stock available
	public function fetchManufactures(){
			$sql = "SELECT  sum(products.Product_unit) AS total, manufacturers.manufacturer_name FROM products LEFT JOIN manufacturers ON manufacturers.manufacturer_id = products.manufacturer_id GROUP By manufacturer_name";
		$row= array();

				//execute the query
		$result = $this->proddb->dbconect->query($sql);
		

		if($this->proddb->dbconect->affected_rows>0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{

		echo "Error: ".$this->proddb->dbconect->error;
			
		}
		return $row;
	}
		//functions to display the categories with their sum
		public function displayCategories(){
			$sql = "SELECT  sum(products.Product_unit) AS 'total', category.category_name FROM products LEFT JOIN category ON category.category_id = products.category_id GROUP By category_name";
		$row= array();

				//execute the query
		$result = $this->proddb->dbconect->query($sql);
		

		if($this->proddb->dbconect->affected_rows>0){
			$row = $result->fetch_all(MYSQLI_ASSOC);
		}else{

		echo "Error: ".$this->proddb->dbconect->error;
			
		}
		return $row;
	}



	}
	?>