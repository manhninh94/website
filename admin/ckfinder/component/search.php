<form class="loaimay" style="margin-top:15px" name="frmSearch" method="post" action="index.php?task=search" onsubmit="return CheckEmpty(this);">
			<select name="chungloai">
			<option value="">-- Tất cả Chủng loại --</option>
			  <?php
				$sql = "select * from chungloai";
				$query = mysql_query($sql);
				while($row = mysql_fetch_array($query)){
			?>
			<option value="<?echo $row['MaCL'];?>"><?echo $row['TenCL'];?></option>
			<?}?>
			</select>
			
			<input type="text" style="padding:0px;margin:0px;height:25px;width:190px" name="keyword" size="20" />
			<input type="submit" value="Tìm kiếm" class="buttom" name="sub_search" />
         	<a  class="all" href="?task=product">Tất cả</a>
		</form>
	
		 <div class="center_title_bar">Kết quả tìm kiếm</div>	
<?php
$keyword = $_POST['keyword'];

	$cl=$_POST['chungloai'];
	
				

		 if(isset($_POST["sub_search"]))
			{
			$keyword=$_POST["keyword"];
				if(isset($_POST["chungloai"]))
				{
				$cl=$_POST['chungloai'];
				}
			

				if((empty($keyword)))
					{
				  echo "<script>alert('Bạn phải nhập hoặc chọn điều kiện để tìm kiếm!');</script>";
					echo"<script>document.location.href='?task=products' </script>";
				}
				if($cl=="")
				{
					$strwhe2="";
				}
				else
				{
					$strwhe2=" AND MaCL='".$cl."'";
				}
				
				
				
	 $sql="SELECT * FROM sanpham WHERE `TenSP` LIKE '%$keyword%'".$strwhe2." ORDER BY `MaSP` DESC";
	
?>
  <div class="items">
  
	
<?php
	$query=mysql_query($sql);
	 mysql_query("SET NAMES 'UTF8'");
	// echo $sql;
$count=mysql_num_rows($query);
if($count>0)
	{?>
	<table class="table">
<tr>
		<th>Chọn</th>
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
	<?if(admin()){?><th colspan=2>Chức năng</th><?}?>
	</tr>
	<?
		while($row=mysql_fetch_array($query))
		{
			?>
			
		<tr>
		<td><input class="checkbox" type="checkbox" name="chk[]" value="<? echo $row['MaSP']; ?>"></td>
		<td><?echo  $row['TenSP'];?></td>	
		
		<td><?echo  $row['SoLuong'];?></td>
		<td><?echo number_format ($row['DonGia'],0,'','.'). " VND";?></td>
		
		<?if(admin()){
		echo '<td><a href="?task=add_sanpham&edit_sanpham&masp='.$row['MaSP'].'"><img src="images/iconsua.png" width=22px height=22px></a></td>';
		echo '<td><a href="?task=products&delete='.$row['MaSP'].'"><img src="images/iconxoa.png" width=18px height=18px></a></td>';
		}
		echo '</tr>';
}
}
else echo '<p class="update">Không tìm thấy kết quả nào!</p>';
}
?>
</table>
</div>    