
<div class="NewItem" style="margin-bottom:20px;padding:10px 0px 20px 10px;">
    	
            <div class="ListNewItem">
			<h3 class="title">Kết quả tìm kiếm</h3>
		<ul>
<?php 
$keyword = $_POST['keyword'];

				if((empty($keyword)))
					{
				  echo "<script>alert('Bạn phải nhập từ khóa để tìm kiếm!');</script>";
					echo"<script>document.location.href='?task=products' </script>";
				}
				
	
?>
  <div class="items">

<?php 
			
	 $sql="SELECT * FROM sanpham WHERE `TenSP` LIKE '%$keyword%' OR `MaSP` LIKE '%$keyword%' ORDER BY `MaSP` DESC";
	
	$query=mysql_query($sql);
	 mysql_query("SET NAMES 'UTF8'");
	// echo $sql;
$count=mysql_num_rows($query);
if($count>0)
	{
		while($row=mysql_fetch_array($query))
		{
			?>
		 <li>
               		<div class="PicNewItem">
               		<a href="chitiet-<?echo $row['MaSP'];?>.html" title="<?echo $row['TenSP'];?>">
						<img src="<?echo $row['HinhAnh'];?>" alt="<?echo $row['TenSP'];?>" title="<?echo $row['TenSP'];?>" border="0">
               	 	</a>
					</div>
                             <div class="SeriesNewItem">
								<a href="chitiet-<?echo $row['MaSP'];?>.html" title="<?echo $row['TenSP'];?>"><h3 class="name-product"><?echo $row['TenSP'];?>  </h3></a>
								<strong>Giá: <?php echo number_format ($row['DonGia'],0,'','.'). " VNĐ";?> </strong>
							 </div>
                                <div class="bttnBuynow" style="text-align:center; padding-top:5px;">
                                  <a href="them-vao-gio-hang-<?php echo $row['MaSP'];?>.html" title="Thêm vào giỏ hàng">
                                  <img src="images/btn-buynow.gif" hspace="5" border="0">   </a>
                                </div>
                  </li>
	<?php 
}
}
else echo '<p class="update">Không tìm thấy kết quả nào!</p>';

?>
</ul>
</div>    </div>    