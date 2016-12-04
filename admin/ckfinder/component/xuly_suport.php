<div id="tit_list">
<div id="txt"><p>Cấu hình Suport</p></div>
<?php if(admin()){?>
	<div id="process"> 
	<ul>
		<li><a href="?task=add_suport" class="add">Thêm</a></li>
	</ul>
	</div>
<?php }?>
</div>
<table border=0 class="table">
<tr >
	<th>STT</th>
	<th>Tiêu đề</th>
	<th>Phone</th>
	<th>Yahoo</th>
	<th>Skype</th>
	<?php if(admin()){?><th colspan=2 width=40px>Chức năng</th><?php }?>

	</tr>
		  <?php 
			$sql="select * from tbl_suport";
		?>
		<?php 
		$query=mysql_query($sql);
		$stt=0;
		while($row=mysql_fetch_array($query))
		{
		$stt++;
		echo '<tr><td>'.$stt.'</td>';
		echo "<td>".$row['title']."</td><td>".$row['phone']."</td><td>".$row['yahoo']."</td><td>".$row['skype']."</td>";
		if(admin()){
		echo '<td><a href="?task=add_suport&edit_suport&id='.$row['id'].'"><img src="images/iconsua.png" wMaCLth=22px height=22px></a></td>';
		echo '<td><a href="?task=suport&delete='.$row['id'].'"><img src="images/iconxoa.png" wMaCLth=16px height=16px></a></td>';
		}
		echo '</tr>';
}
?>
</table>

<?php 
if(isset($_GET['delete']))
{
	$sql="delete from tbl_suport where id='".$_REQUEST['delete']."'";
	mysql_query($sql);
echo"<script>document.location.href='?task=suport' </script>";
}
?>
<?php 
if(isset($_POST['ok']))
{
	$title=$_POST['title'];
	$phone=$_POST['phone'];
	$yahoo=$_POST['yahoo'];
	$skype=$_POST['skype'];
		$sql="INSERT INTO tbl_suport
			VALUES
			('','$title','$phone','$yahoo','$skype')";
		$query=mysql_query($sql,$con);
		//echo $sql;
	echo"<script>document.location.href='?task=suport' </script>";

}
?>
<?php 
if(isset($_POST["edit"]))
{
	$id=$_POST['id'];
	$title=$_POST['title'];
	$phone=$_POST['phone'];
	$yahoo=$_POST['yahoo'];
	$skype=$_POST['skype'];
	$sql="UPDATE  `tbl_suport` SET
	`title` =  '".$title."',
	`phone` =  '".$phone."',
	`yahoo` =  '".$yahoo."',
	`skype` =  '".$skype."'
	WHERE `id` ='".$id."'";
	mysql_query($sql);
	//echo $sql;
echo"<script>document.location.href='?task=suport' </script>";
}
mysql_close($con);
?>

