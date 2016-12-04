<div class="info_ac">
<table>
	<?
	if(isset($_GET["id"]))
	{
	$id=$_GET["id"];
	}
	$sql="select * from nguoidung where Id='$id'";
		$query=mysql_query($sql);
		 mysql_query("SET NAMES 'UTF8'");
		while($row=mysql_fetch_array($query))
		{?>
		<tr><td rowspan=4 width=270px height=160px><img src="<?echo "../".$row['Image'];?>" height=160px width=200px></td><td width=80px height=40px><b>Họ và tên:</b></td><td width=130px><b><?echo $row['Name'];?></b></td></tr>
		<tr><td width=80px height=40px><b> Tài khoản:</b></td><td><b><?echo $row['Username'];?></b></td></tr>
		<tr><td width=80px height=40px><b>Email:</b></td><td><b><?echo $row['Email'];?></b></td></tr>
		<tr><td width=80px height=40px><b>Cấp độ:</b></td><td><b><?if($row['Level']==1){echo "admin";}else echo"member";?></b></td></tr>
	<?}?>
	</table>
	<a href="?task=a_mem&edit_mem&Id=<?echo $id;?>">Thay đổi thông tin tài khoản</a>
</div>