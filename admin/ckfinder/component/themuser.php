
<div id="tit_list">
<div id="txt"><p>Thêm mới</p></div>
	<div id="process"> 
	<ul>
		<li><a class="close" href="?task=user">Đóng</a></li>
	</ul>
	</div>
</div>
	<div class="bor_them">
<form action="?task=user" method="POST" enctype="multipart/form-data">
<table class="tbl1">
<?
if(isset($_GET["edit_user"]))
{
$id=$_GET["Id"];
$sql="SELECT * FROM `user` WHERE Id='$id'";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
}?> 
 <input size=10 type="hidden" name="id" <?if(isset($_GET["edit_user"])){?>value="<?php echo $rows['Id'];?>"<?}?>>
		<tr>
			<td class="tbltitle">Name: </td>
		   <td> <input size=10 type="text" name="name" <?if(isset($_GET["edit_user"])){?>value="<?php echo $rows['Hoten'];?>"<?}?>></td>
		 <tr/>
		 <tr>
			<td class="tbltitle">Username: </td>
			<td><input size=10 type="text" name="user_name" <?if(isset($_GET["edit_user"])){?>value="<?php echo $rows['Username'];?>"<?}?>/></td>
		 <tr/>
		 <?if(!isset($_GET["edit_user"])){?>
		  <tr>
		<td class="tbltitle2">Password: </td>
		<td><input size=10 type="password" name="pass_word" value=""/></td>
	  </tr>
	  <?}?>
		   <tr>
		<td class="tbltitle2">Địa chỉ: </td>
		<td><input size=10 type="text" name="diachi" <?if(isset($_GET["edit_user"])){?>value="<?php echo $rows['DiaChi'];?>"<?}?>/></td>
	  </tr>
	</table>
	<table class="tbl2">
	 <tr>
			<td class="tbltitle">Email: </td>
			<td><input size=10 type="text" name="email" <?if(isset($_GET["edit_user"])){?>value="<?php echo $rows['Email'];?>"<?}?>/></td>
		 <tr/>
		 <tr>
			<td class="tbltitle">Phone: </td>
			<td><input size=10 type="text" name="phone" <?if(isset($_GET["edit_user"])){?>value="<?php echo $rows['Phone'];?>"<?}?>/></td>
		 <tr/>  
		
 </table>
 <div class="but">
	<div class="but">
	<?if(isset($_GET["edit_user"])){
	echo '<input type="submit" class="buttom" name="edit" value="Sửa" />';
	}
	else{
	echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';}?>
	<input type="reset" class="reset" name="huy" value="Hủy" />
	
	</form></div>
	</div>