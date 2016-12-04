<div class="NewItem">
    
			<h3 class="title2">Đăng nhập hệ thống</h3>
		 <div class="box-login">
		<form action="" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">

		
		<table>
		<tr><td width=40%>
					Tên đăng nhập:</td>
					<td><input class="user" type="text" size=25 name="userid"></td>
					</tr>
		<tr>
					<td> Mật khẩu:</td>
					<td><input class="pass" type="password" size=25 name="password"></td>
		</tr>
		<tr>
		<td></td>
			<td><input class="button1" type="submit" name="dangnhap" value="Login">
			<input class="button" type="reset" name="huy" value="Cancel"></td>
	</tr>
	</table>
	</form>
</div>
<?php 
 if(isset($_POST['dangnhap']))
    {
      $id=$_POST['userid'];
      $p=md5($_POST['password']);  
     if($id && $p)
     {
      $sql="select username,password from user where username='".$id."' and password='".$p."'";
	  $query=mysql_query($sql);
	  $count=mysql_num_rows($query);
      if($count<1)
      {
     echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!');</script>";
	 echo"<script>document.location.href='?com=login' </script>";
      }
      else
      {
	   $row=mysql_fetch_array($query);
       $_SESSION['username'] = $row['username'];
	    echo "<script>alert('Đăng nhập thành công!');</script>";
		if(isset($_GET['checkout']))
		{
		echo"<script>document.location.href='thanhtoan.html' </script>";
		}
		else
		{
		  echo"<script>document.location.href='index.php' </script>";
      }
	  }
     }
    }
	?>
	</div>