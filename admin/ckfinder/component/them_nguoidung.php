
<div id="tit_list">
<div id="txt"><p>Thêm mới</p></div>
	<div id="process"> 
	<ul>
		<li><a class="close" href="?task=nguoidung">Đóng</a></li>
	</ul>
	</div>
</div>
	<div class="bor_them">
<form action="?task=nguoidung" method="POST" enctype="multipart/form-data">
<table class="tbl1">
<?php 
if(isset($_GET["edit_mem"]))
{
$id=$_GET["MaND"];
$sql="SELECT * FROM `nguoidung` WHERE ID='$id'";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
}?>
 <input size=10 type="hidden" name="id" <?php if(isset($_GET["edit_mem"])){?>value="<?php  echo $rows['MaND'];?>"<?php }?>>
		<tr>
			<td class="tbltitle">Name: </td>
		   <td> <input size=10 type="text" name="name" <?php if(isset($_GET["edit_mem"])){?>value="<?php  echo $rows['HoTen'];?>"<?php }?>></td>
		 <tr/>
		 <tr>
			<td class="tbltitle">Username: </td>
			<td><input size=10 type="text" name="user_name" <?php if(isset($_GET["edit_mem"])){?>value="<?php  echo $rows['TaiKhoan'];?>"<?php }?>/></td>
		 <tr/>
		 <?php if(!isset($_GET["edit_mem"])){?>
		  <tr>
		<td class="tbltitle2">Password: </td>
		<td><input size=10 type="password" name="pass_word" value=""/></td>
	  </tr>
	  <?php }?>
		   <tr>
		<td class="tbltitle2">Địa chỉ: </td>
		<td><input size=10 type="text" name="diachi" <?php if(isset($_GET["edit_mem"])){?>value="<?php  echo $rows['DiaChi'];?>"<?php }?>/></td>
	  </tr>
	</table>
	<table class="tbl2">
	 <tr>
			<td class="tbltitle">Email: </td>
			<td><input size=10 type="text" name="email" <?php if(isset($_GET["edit_mem"])){?>value="<?php  echo $rows['Email'];?>"<?php }?>/></td>
		 <tr/>
		  <tr>
			<td class="tbltitle2">Hình ảnh: </td>
			<td><input class="tepanh" type="file" name="file_up" <?php if(isset($_GET["edit_mem"])){?>value="<?php  echo $rows['HinhAnh'];?>"<?php }?>/></td><input type="hidden" name="linkimages" value="<?php  echo $rows['HinhAnh'];?>">
		</tr>
		 <?php if(!isset($_GET["edit_mem"])){?>
	  <tr>
		<td class="tbltitle2">Cấp độ: </td>
		<td><select name="level"><option value="1">Admin</option><option value="2">Member</option></select>
	  </tr>
	  <?php }?>
 </table>
 <div class="but">
	<div class="but">
	<?php if(isset($_GET["edit_mem"])){
	echo '<input type="submit" class="buttom" name="edit" value="Sửa" />';
	}
	else{
	echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';}?>
	<input type="reset" class="reset" name="huy" value="Hủy" />
	
	</form></div>
	</div>