	<div class="box-pro">
	<div class="title2">
	</div>
<?php 
$baitren_mottrang = 9;
if ( !$_GET['page'] )
{
    $page = 0 ;
}
if(isset($_GET['page']))
{
	$page=$_GET['page'];
}
$sodu_lieu = mysql_num_rows(mysql_query("SELECT * FROM `tbl_product`") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$sum=$page*$baitren_mottrang;
$sql3="SELECT * FROM `tbl_product` ORDER BY `id` DESC  LIMIT $sum,$baitren_mottrang";
$result =mysql_query($sql3) or die(mysql_error()); 
$count=mysql_num_rows($result);
if($count>0)
	{
		while($row=mysql_fetch_array($result))
		{
			?>
		<div class="product">
			<a href="?task=detailpro&id=<?php echo $row['id'];?>"><img class="imgpro" src="<?php echo $row['image'];?>" width=140px height=110px></a>
			<div class="namepro" > <?php  echo $row['name'];?></div>
			<div class="price"><span style="text-align:center;color:#333;">Giá: </span><?php echo $row['dongia'];?>VND</div>
			<div class="check"><a class="detail" href="index.php?task=cart&add=<?php echo $row['id'];?>">Mua hàng</a></div>
		</div>
	<?php 
}
}
else echo '<p class="update">Sản phẩm đang được cập nhật!</p>';
?>
<div class="phantrang"><?
for ( $page = 0; $page <= $sotrang; $page ++ )
{
echo "<a href='index.php?task=product&page={$page}'>{$page}</a>";

}
?>
</div>
</div>