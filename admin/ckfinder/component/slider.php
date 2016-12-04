
<div id="tit_list">
<div id="txt"><p>Danh sách ảnh slider</p></div>
	<div id="process"> 
	<ul>
		<li><a href="?task=a_slider" class="add">Thêm</a></li>
		<li><input type="submit" class="del" name="xoa" value="xóa" /></li>
	</ul>
	</div>
</div>
<table border=0 class="table">
<tr >
		<th>Name</th>
		<th>Hình ảnh</th>
		<th>Ẩn/hiện</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
		  <?php 
		$sql="select * from slider";
		$query=mysql_query($sql);
		while($row=mysql_fetch_array($query))
		{
		?>
		<tr>
		<td><?php  echo $row['intro'];?></td>
		<td><img src=<?php  echo "../".$row['name_img'];?> height=35px width=150px></td>
		
		<td>
		<?php  if($row['active']==1)
		{?>
			<a href="?task=slider&active&id=<?php  echo $row['id'];?>"><img src="images/but_ok.jpg" width=15px height=15px></a>
			<?php }
			else{?>
			<a href="?task=slider&active&id=<?php  echo $row['id'];?>"><img src="images/an.png" width=15px height=15px></a>
			<?php }?>
		</td>
		<td><a href="?task=a_slider&e_slider&id=<?php echo $row['id'];?>"><img src="images/iconsua.png" width=22px height=22px></a></td>
		<td><a href="?task=slider&delete=<?php  echo $row['id'];?>"><img src="images/iconxoa.png" width=15px height=15px></a></td>
		
		</tr>
	<?php }
	?>
</table>
<?php 
if(isset($_GET['delete']))
{
	$sql="delete from slider where id='".$_REQUEST['delete']."'";
	mysql_query($sql);
echo"<script>document.location.href='?task=slider' </script>";
}
?>
<?php 
if(isset($_POST['ok']))
{
$id=$_POST['id'];
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
	$link = "images/" . $_FILES["file_up"]["name"]; 
	
		$sql2="INSERT INTO slider
		VALUES
		('','$link','$_POST[intro]','1')";
		$query2=mysql_query($sql2,$con);
	//echo $sql2;
	echo"<script>document.location.href='?task=slider' </script>";	
}
if(isset($_GET['active']))
{
$id=$_GET['id'];
$sql="UPDATE slider SET `active`=if(`active`=1,0,1) WHERE id='$id'";
mysql_query($sql);
//echo $sql;
echo"<script>document.location.href='?task=slider' </script>";	
}
?>
<?php 
if(isset($_POST["edit"]))
{
	if($_FILES["file_up"]["name"]!="")//nếu chọn ảnh đường dẫn
	{
	if ($_FILES["file_up"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file_up"]["error"] . "<br />";
		}
	  else
		{
		if (file_exists("../images/" . $_FILES["file_up"]["name"]))
		  {
		  echo $_FILES["file_up"]["name"] . " da ton tai file tren server.";
		  }
		else
		  {  
		  move_uploaded_file($_FILES["file_up"]["tmp_name"],
		  "../images/" . $_FILES["file_up"]["name"]);	
		  }
		}
	$link = "images/" . $_FILES["file_up"]["name"];
	}
	else{
		$link=$_POST['linkimages'];// nếu chưa chọn thì ảnh vẫn là ảnh cũ
	}
	$tenanh=$_POST['intro'];
	$id=$_POST['id'];
	$sql="UPDATE  `slider` SET
	`intro` ='".$tenanh."',
	`name_img` ='".$link."'
	where id='".$id."'";
	//echo $sql;
	mysql_query($sql);
	echo"<script>document.location.href='?task=slider' </script>";
	
}
?>