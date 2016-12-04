<?php
session_start();
if(isset($_GET['unset']))
{
	unset($_SESSION['user']);	
	unset($_SESSION['level']);
	echo "<script>alert('Logout Subccessfull!!!');</script>";
	echo"<script>document.location.href='../index.php' </script>";
}
?>