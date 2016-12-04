<?php 
session_start();
if(isset($_GET['unset']))
{
	unset($_SESSION['username']);	
		unset($_SESSION['cart']);
	echo "<script>alert('Thoát thành công!!!');</script>";
	echo"<script>document.location.href='../index.php' </script>";
}
?>