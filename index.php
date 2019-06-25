<?php include_once('indexheader.php');?>
<style type="text/css">
	{
		border:1px solid red;
	}
</style>
			<div class="container-fluid mt-2">
				<!-- begins indexsidebar.php-->
				<?php 
				include_once('indexsidebar.php');

				 
				 //ends indexsidebar.php
				 //begins suinfo.php
				 
				//ends page subinfo.php
				include_once('pagesubinfo.php');
				//ends page subinfo.php


				//begins indexdisplay.php

				include_once('indexdisplay.php');

				//ends indexdisplay.php
				?>
				
				</div>
			
<?php
include('indexfooter.php');
?>