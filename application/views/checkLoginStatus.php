<?php 
if(isset($_SESSION['manager']) == false) 
	redirect('Admin_controller/logIn','refresh'); 
else
	$name = $_SESSION['manager'][0]['name'];
?>