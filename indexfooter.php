<!-- script section -->
			<!--jquery-3.3.1.js-->
			
			<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
				<!--bootsrap.js)-->
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.js"></script>
				<!-- Popper -->
			<!--internal javascript-->
			<script type="text/javascript">

				$(document).ready(function(){
				$.get("defaultindex.php", function(data){
			document.getElementById('prodisplay').innerHTML = data;
		});	

					$('#catid').change(function(){
					var categoryid = $('#catid').val();
					
					//jquery Ajax taking one parameter key value pair
					$.ajax({

						type: "POST",
						url:  "defaultindex.php",
						data: "mycatid=" + categoryid,
						success: function(response){
							document.getElementById('prodisplay').innerHTML = response;
						}


					});
					
				});



			});

			</script>
			</body>
	</html>
	<?php  
ob_end_flush();
	?>