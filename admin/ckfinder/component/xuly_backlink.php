<div id="tit_list">
<div id="txt"><p>Danh sách website liên kết</p></div>
<?if(admin()){?>
	<div id="process"> 
	<ul>
		<li><a href="?task=add_backlink" class="add">Thêm</a></li>
	</ul>
	</div>
<?}?>
</div>
<table border=0 class="table">
<tr >
	<th>STT</th>
	<th>Tên website</th>
	<th>Link</th>
	<?if(admin()){?><th colspan=2 width=40px>Chức năng</th><?}?>
	</tr>
		  <?php
		$sql="select * from tbl_backlink";
		$query=mysql_query($sql);
		$stt=0;
		while($row=mysql_fetch_array($query))
		{
		$stt++;
		echo '<tr><td>'.$stt.'</td>';
		echo "<td>".$row['title']."</td>";
		echo "<td>".$row['link']."</td>";
	
		if(admin()){
		echo '<td><a href="?task=add_backlink&edit_backlink&id='.$row['id'].'"><img src="images/iconsua.png" wMaCLth=22px height=22px></a></td>';
		echo '<td><a href="?task=backlink&delete='.$row['id'].'"><img src="images/iconxoa.png" wMaCLth=16px height=16px></a></td>';
		}
		echo '</tr>';
}
?>
</table>
<?php
if(isset($_GET['delete']))
{
	$sql="delete from tbl_backlink where id='".$_REQUEST['delete']."'";
	mysql_query($sql);
echo"<script>document.location.href='?task=backlink' </script>";
}
?>
<?php
if(isset($_POST['ok']))
{
$id=$_POST['id'];
		$sql2="INSERT INTO tbl_backlink
		VALUES
		('','$_POST[title]','$_POST[link]')";
		$query2=mysql_query($sql2,$con);
		//echo $sql2;
echo"<script>document.location.href='?task=backlink' </script>";	
}
if(isset($_GET['active']))
{
$id=$_GET['id'];
$sql="UPDATE tbl_backlink SET `active`=if(`active`=1,0,1) WHERE id='$id'";
mysql_query($sql);
//echo $sql;
echo"<script>document.location.href='?task=backlink' </script>";	
}



if(isset($_POST["edit"]))
	{
		$id=$_POST['id'];
		$sql="UPDATE  tbl_backlink SET
			`title` ='$_POST[title]',
			`link` ='$_POST[link]'
			WHERE id='".$id."'";
				mysql_query($sql);
		//	echo $sql;
			echo"<script>document.location.href='?task=backlink' </script>";	
			}
			?>