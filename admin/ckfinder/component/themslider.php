
<div id="tit_list">
<div id="txt"><p>Thêm ảnh slider</p></div>
	<div id="process"> 
	<ul>
		<li><a class="close" href="?task=slider" class="add">Đóng</a></li>
	</ul>
	</div>
</div>
<?
if(isset($_GET["e_slider"]))
{
$id=$_GET["id"];
$sql="SELECT * FROM slider where id='$id'";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
}?> 
<div class="bor_them">
<form action="?task=slider" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
<table class="tbl1">
		  <input size=10 type="hidden" name="id" <?if(isset($_GET["e_slider"])){?>value="<?php echo $rows['id'];?>"<?}?> autocomplete = "off"/>
		<tr>
			<td class="tbltitle">Tên ảnh:</td>
		   <td> <input size=10 type="text" name="intro" <?if(isset($_GET["e_slider"])){?>value="<?php echo $rows['intro'];?>"<?}?> value="" autocomplete = "off"></td>
		 <tr/>	
	</table>
<table class="tbl2">
		  <tr>
			<td class="tbltitle2">Hình ảnh: </td>
			<td><input type="file" name="file_up" <?if(isset($_GET["e_slider"])){?>value="<?php echo $rows['name_img'];?>"<?}?>/></td><input type="hidden" name="linkimages" value="<?php echo $rows['name_img'];?>">
	  </tr>
		 </table>
		 
<div class="but">
		<?if(isset($_GET["e_slider"])){
		echo '<input type="submit" class="buttom" name="edit" value="Sửa" />';
		}
		else{
		echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';}
		?><input type="reset" class="reset" name="ok" value="Hủy" />
		
	</form>
	 </div>
 </div>
	