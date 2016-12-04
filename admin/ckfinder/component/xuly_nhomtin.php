<div id="tit_list">
<div id="txt"><p>Nhóm tin</p></div>
<?php if(admin()){
	include("connect.php");
	?>
	<div id="process"> 
	<ul>
		<li><a href="?task=them_nhomtin" class="add">Thêm</a></li>
	</ul>
	</div>
<?php }?>
</div>
<table border=0 class="table">
<tr >
	<th>STT</th>
	<th>Mã Nhóm</th>
	<th>Tên Nhóm</th>
	<?php if(admin()){?><th colspan=2 width=40px>Chức năng</th><?php }?>
	</tr>
      <?php
        $sql="select * from nhomtin";
		$query=mysql_query($sql);
		$stt=0;
		while($row=mysql_fetch_array($query))
		{
		$stt++;
		echo '<tr><td>'.$stt.'</td>';
		echo "<td>".$row['ID']."</td><td>".$row['TenNhom']."</td>";
		if(admin()){
		echo '<td><a href="?task=them_nhomtin&sua_nhomtin&id='.$row['ID'].'"><img src="images/iconsua.png" width=22px height=22px></a></td>';
		echo '<td><a href="?task=nhomtin&delete='.$row['ID'].'"><img src="images/iconxoa.png" width=16px height=16px></a></td>';
		}
		echo '</tr>';
    }
    ?>
</table>
<?php
$obj="nhomtin";
if(isset($_GET['delete']))/* xử lý xóa*/
{
	$sql="delete from nhomtin where ID='".$_REQUEST['delete']."'";
	mysql_query($sql);
    echo"<script>document.location.href='?task=".$obj."' </script>";
}
if(isset($_POST['ok'])) /* xử lý thêm mới*/
{
    $tencm=$_POST['txt_tennhom'];
    $sql="INSERT INTO nhomtin VALUES('','$tencm')";
    $query=mysql_query($sql,$con);
    echo"<script>document.location.href='?task=".$obj."' </script>";

}
if(isset($_POST["edit"]))/* xử lý  sửa*/
{
	$macm=$_POST['txtid'];
	$tencm=$_POST['txt_tennhom'];
	$sql="UPDATE  `nhomtin` SET
	`TenNhom` =  '".$tencm."' WHERE `ID` ='".$macm."'";
	mysql_query($sql);
	//echo $sql;
    echo"<script>document.location.href='?task=".$obj."' </script>";
}
mysql_close($con);
?>

