<div id="tit_list">
<div id="txt"><p>Chuyên mục sản phẩm</p></div>
<?php if(admin()){?>
	<div id="process"> 
	<ul>
		<li><a href="?task=them_chuyenmuc" class="add">Thêm</a></li>
	</ul>
	</div>
<?php }?>
</div>
<table border=0 class="table">
<tr >
	<th>STT</th>
	<th>Mã CM</th>
	<th>Tên CM</th>
	<?php if(admin()){?><th colspan=2 width=40px>Chức năng</th><?php }?>
	</tr>
      <?php
        $sql="select * from chuyenmucsanpham";
		$query=mysql_query($sql);
		$stt=0;
		while($row=mysql_fetch_array($query))
		{
		$stt++;
		echo '<tr><td>'.$stt.'</td>';
		echo "<td>".$row['ID']."</td><td>".$row['TenCM']."</td>";
		if(admin()){
		echo '<td><a href="?task=them_chuyenmuc&sua_chuyenmuc&id='.$row['ID'].'"><img src="images/iconsua.png" width=22px height=22px></a></td>';
		echo '<td><a href="?task=chungloai&delete='.$row['ID'].'"><img src="images/iconxoa.png" width=16px height=16px></a></td>';
		}
		echo '</tr>';
    }
    ?>
</table>
<?php
$obj="chuyenmuc";
if(isset($_GET['delete']))/* xử lý xóa*/
{
	$sql="delete from chuyenmucsanpham where ID='".$_REQUEST['delete']."'";
	mysql_query($sql);
    echo"<script>document.location.href='?task=".$obj."' </script>";
}
if(isset($_POST['ok'])) /* xử lý thêm mới*/
{
    $tencm=$_POST['txt_tencm'];
    $sql="INSERT INTO chuyenmucsanpham VALUES('','$tencm')";
    $query=mysql_query($sql,$con);
    echo"<script>document.location.href='?task=".$obj."' </script>";

}
if(isset($_POST["edit"]))/* xử lý  sửa*/
{
	$macm=$_POST['txtid'];
	$tencm=$_POST['txt_tencm'];
	$sql="UPDATE  `chuyenmucsanpham` SET
	`TenCM` =  '".$tencm."' WHERE `ID` ='".$macm."'";
	mysql_query($sql);
	//echo $sql;
    echo "<script>document.location.href='?task=chungloai' </script>";
}
mysql_close($con);
?>

