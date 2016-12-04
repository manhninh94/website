<div id="tit_list">
<div id="txt"><p>Danh sách Người đặt hàng</p></div>
</div>
      <?php 	
		include("connect.php");
		$sql="select * from thongtindonhang order by ID DESC";
		$query=mysql_query($sql);
		
		?>
		<table class="table"  width=100%>
			<tr >
				<th>Họ và tên</th>
				<th>Địa chỉ</th>
				<th>Phone</th>
				<th>Thời gian</th>
				<?php if(admin()){
				?><th>Đơn hàng</th>
				<th>Xuất hóa đơn</th>
				<th>Xóa</th><?php }?>
			</tr>
			<?php 
			while($row=mysql_fetch_array($query))
			{ 
			?>
			<tr>
			<?php 
			echo "<td>".$row['HoTen']."</td><td>".$row['DiaChi']."</td><td>".$row['DienThoai']."</td><td>".$row['ThoiGian']."</td>";
			if(admin()){
			echo '<td><a href="?task=chitietdonhang&id='.$row['ID'].'">xem đơn hàng</a></td>';
			echo '<td><a href="component/xuathoadon.php?id='.$row['ID'].'">Xuất</a></td>';
			echo '<td><a href="?task=donhang&delete='.$row['ID'].'"><img src="images/iconxoa.png" width=16px height=16px></a></td>';
			}?></tr>
			<?php 
			}
			?>
</table>

<?php 
if(isset($_GET['delete']))
{
	$sql="delete from chitietdonhang where DonHangID='".$_REQUEST['delete']."'";
	mysql_query($sql);
	$sql2="delete from thongtindonhang where ID='".$_REQUEST['delete']."'";
	mysql_query($sql2);
echo"<script>document.location.href='?task=donhang' </script>";
}
?>