<div id="tit_list">
<div id="txt"><p>Danh sách người dùng</p></div>
<?php if(admin()){  include("connect.php");	?>
	<div id="process"> 
	<ul>
		<li><a href="?task=a_mem" class="add">Thêm</a></li>
		<li><input type="submit" class="del" name="xoa" value="xóa" /></li>
			</ul>
	</div>
	<?php }?>
</div>
<table border=0 class="table">
<tr >
	<th>STT</th>
		<th>TaiKhoan</th>
		<th>Name</th>
		<th>Email</th>
		<th>Quyền</th>
		<?php if(admin()){?>
		<th>Sửa</th>
		<th>Xóa</th>
		<?php }?>
</tr>
		  <?php 
			$sql="select * from nguoidung";
			$query=mysql_query($sql);
		$stt=0;
		while($row=mysql_fetch_array($query))
		{
		$stt++;
		echo '<tr><td>'.$stt.'</td><td>'.$row['TaiKhoan'].'</td>';?>
		<td><?php echo $row["HoTen"];?></td><td><?php echo $row['Email'];?></td><td><?php if($row['CapDo']==1){echo "admin";}else echo"nguoidung";?></td>
			<?php if(admin()){
		echo '<td><a href="?task=a_mem&edit_mem&MaND='.$row['ID'].'"><img src="images/iconsua.png" width=22px height=22px></a></td>';
		echo '<td><a href="?task=nguoidung&delete='.$row['ID'].'"><img src="images/iconxoa.png" width=16px height=16px></a></td>';
		}?>
		<?php 
}
?>
</table>

<?php 
if(isset($_GET['delete']))
{
	$sql="delete from nguoidung where MaND='".$_REQUEST['delete']."'";
	mysql_query($sql);
	echo"<script>document.location.href='?task=nguoidung' </script>";
}
?>
<?php 
if(isset($_POST['ok']))
{
	$user=$_POST["user_name"];
	$rs=mysql_num_rows(mysql_query("select * from `nguoidung` where `TaiKhoan`='$user'"));
	if($rs>0)
	{
		echo"<script>alert('User này đã tồn tại!') </script>";
		echo"<script>document.location.href='?task=a_mem' </script>";
	}
	else{
	$p=md5($_POST['pass_word']);
	//images
		if ($_FILES["file_up"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file_up"]["error"] . "<br />";
		}
	  else
		{
		if (file_exists("../images/" . $_FILES["file_up"]["name"]))
		  {
		  echo $_FILES["file_up"]["name"] . " da ton tai file tren server. ";
		  }
		else
		  {  
		  move_uploaded_file($_FILES["file_up"]["tmp_name"],
		  "../images/" . $_FILES["file_up"]["name"]);	
		  }
		}
		$lv=$_POST['level'];
		$link = "images/" . $_FILES["file_up"]["name"]; // đóng images
		$sql2="INSERT INTO nguoidung
		VALUES
		('','$_POST[name]','$_POST[user_name]','$link','$_POST[email]','$_POST[diachi]','$p','$lv')";
		$query2=mysql_query($sql2,$con);
		//echo $sql2;
		echo"<script>document.location.href='?task=nguoidung' </script>";
	}
}
?>
<?php 
if(isset($_POST["edit"]))
{
	if($_FILES["file_up"]["name"]!="")//nếu chọn ảnh đường dẫn
	{
	$link = "images/" . $_FILES["file_up"]["name"];
	}
	else{
		$link=$_POST['linkimages'];// nếu chưa chọn thì ảnh vẫn là ảnh cũ
	}
	$MaND=$_POST['id'];
	$name=$_POST['name'];
	$user=$_POST['user_name'];
	$email=$_POST['email'];

	$sql="UPDATE  `nguoidung` SET `Hoten` =  '".$name."',
	`TaiKhoan` =  '".$user."',
	`HinhAnh` =  '".$link."',
	`Email` =  '".$email."'
	where MaND=$MaND";
	mysql_query($sql);

	echo"<script>document.location.href='?task=nguoidung' </script>";
}
mysql_close($con);
?>
