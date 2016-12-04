<div Id="tit_list">
	<div Id="txt"><p>Danh sách Thành viên</p></div>
	<form action="?task=user" name="frm_search" method="POST">
	<?php if(admin()){?>
		<div Id="process"> 
		<ul>
			<li><a href="?task=a_user" class="add">Thêm</a></li>
			<li><input type="submit" class="del" name="xoa" value="xóa" /></li>
			</ul>
		</div>
	<?php }?>
</div>

<table border=0 class="table">
<tr>
	<th>UserId</th>
	<th>Họ và tên</th>
	<th>Địa chỉ</th>
	<th>Email</th>
	<th>Sửa</th>
	<th>Xóa</th>
</tr>
 <?php 
		
		 $sql="SELECT * FROM user";
		$query=mysql_query($sql);
		 mysql_query("SET NAMES 'UTF8'");
		while($row=mysql_fetch_array($query))
		{
		echo "<td>".$row['Username']."</td><td>".$row['Hoten']."</td><td>".$row['DiaChi']."</td><td>".$row['Email']."</td>";
		echo '<td><a href="?task=a_user&edit_user&Id='.$row['Id'].'"><img src="images/iconsua.png" wIdth=22px height=22px></a></td>';
		echo '<td><a href="?task=user&delete='.$row['Id'].'"><img src="images/iconxoa.png" wIdth=16px height=16px></a></td>';
	echo '</tr>';
}
?>
</table>
<?php 
if(isset($_GET['delete']))
{
	$sql="delete from user where Id='".$_REQUEST['delete']."'";
	mysql_query($sql);
echo"<script>document.location.href='?task=user' </script>";
}
?>
<?php 
if(isset($_POST['ok']))
{	
	$pass=md5($_POST['pass_word']);
	$username=md5($_POST['user_name']);
	//echo $pass;
	$count=mysql_num_rows(mysql_query("SELECT Username FROM user WHERE Username='$username'"));
	if($count<1)
	{
	$sql="INSERT INTO user(Id,Hoten,DiaChi,Email,Username,Password,Phone)
	VALUES
	('','$_POST[name]','$_POST[diachi]','$_POST[email]','$_POST[user_name]','$pass','$_POST[phone]')";
	mysql_query($sql);
	//echo $sql;
echo"<script>document.location.href='?task=user' </script>";
}
else
{
	  echo "<script>alert('User đã tồn tại!');</script>";
echo"<script>document.location.href='?task=user' </script>";
}
}
?>
<?php 
if(isset($_POST['edit']))
{	
	$sql="UPDATE user SET
	Hoten='$_POST[name]',
	DiaChi='$_POST[diachi]',
	Email='$_POST[email]',
	Username='$_POST[user_name]',
	phone='$_POST[phone]'
	WHERE Id='$_POST[id]'";
	mysql_query($sql);
	//echo $sql;
echo"<script>document.location.href='?task=user' </script>";
}

mysql_close($con);
?>