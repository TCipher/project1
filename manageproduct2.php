<?php
$pagetitle = "Add Product";
include_once('adminheader.php');
include_once('adminnavbar.php');
include_once('admininfo.php'); 
?>

<div class="wrapper d-flex">
			<!--sidebar-->
<style type="text/css">
	.display{
		font-size:12px;
	}
	a{
		text-decoration:none;
		color:white; 
	}

</style>
<?php
include_once('sidebar.php'); 
?>
<div>
<?php
$productobj = new Products();

$products = $productobj->fetchAllProducts();

?>

<div class="container-fluid"  id="showtable">

	

</div>
<?php
	$itemcount = 200;
	$pages = 200/10;
	for ($i=1; $i<$pages; $i++) { 
		 echo "<button data-pagenum=\"$i\" style='margin:2px; padding:5px; width:50px;' class='btn btn-info btn-lg justify-content-center' id=\"btnpage$i\" >$i</button>";
	}

?>
</div>
</div>
</div>
<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.js"></script>

<script type="text/javascript">
  $(document).ready(function() {


    //to display project on firstpage
      $('#showtable').load("ManageTableAjax.php", {limit: 7, offset:0});

    //pagination
    $('[id^=btnpage]').click(function() {
      var pagenum = $(this).data('pagenum');
      var limit = 7;
      var offset = (pagenum -1) * limit;

      //send the limit and offset using jquery load
      $('#showtable').load("ManageTableAjax.php", {limit: limit, offset:offset});
    });
  });
</script>
<?php		
include_once('adminfooter.php');

?>