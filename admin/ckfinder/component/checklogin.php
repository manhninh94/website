<meta charset="utf-8">
<?php
include("connect.php");
 if(isset($_POST['dangnhap']))
    {
      $id=$_POST['userid'];
      $p=$_POST['password']; 
     if($id && $p)
     {
      $sql="select * from `nguoidung` where TaiKhoan='".$id."' and MatKhau='".$p."'";
	  $query=mysql_query($sql);
	  $count=mysql_num_rows($query);
      if($count<1)
      {
     echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!');</script>";
	 echo"<script>document.location.href='../index.php' </script>";
      }
      else
      {
        session_start();
	   $row=mysql_fetch_array($query);
       $_SESSION['user'] = $row['TaiKhoan'];
	    $_SESSION['level']= $row['CapDo'];
		header('location:../../../admin/index.php');
	    echo"<script>document.location.href='../index.php?task=system' </script>";
      }
     }
    }
	?>