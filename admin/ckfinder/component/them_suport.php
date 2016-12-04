<script type="text/javascript">
function check_frmdangnhap(){
		if(document.frmdangnhap.MaCLsp.value == ""){
			alert("Hãy nhập Chủng laoi!");
			document.frmdangnhap.MaCLsp.focus();
			return false;
		}	

</script>
<div id="tit_list">
<div id="txt"><p>Thêm Hỗ trợ trực tuyến</p></div>
<?if(admin()){?>
	<div id="process"> 
	<ul>
		<li><a href="?task=suport" class="close">Đóng</a></li>
	</ul>
	</div>
<?}?>
</div>
<?
if(isset($_GET["edit_suport"]))
{
$id=$_GET["id"];
$sql="SELECT * FROM tbl_suport where id='$id'";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
}?> 
<div class="bor_them">
	<form action="?task=suport" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
		<table class="tbl1">
	 <input size=10 type="hidden" name="id" <?if(isset($_GET["edit_suport"])){?>value="<?php echo $rows['id'];?>"<?}?> autocomplete = "off"/>
	 <tr>
				<td class="tbltitle2">Tiêu đề: </td>
				<td><input size=10 type="text" name="title" <?if(isset($_GET["edit_suport"])){?>value="<?php echo $rows['title'];?>"<?}?> autocomplete = "off"/></td>
			  </tr>
			   <tr>
				<td class="tbltitle2">Phone: </td>
				<td><input size=10 type="text" name="phone" <?if(isset($_GET["edit_suport"])){?>value="<?php echo $rows['phone'];?>"<?}?> autocomplete = "off"/></td>
			  </tr>
			
		</table>
		<table class="tbl2">
	
			   <tr>
				<td class="tbltitle2">Yahoo: </td>
				<td><input size=10 type="text" name="yahoo" <?if(isset($_GET["edit_suport"])){?>value="<?php echo $rows['yahoo'];?>"<?}?> autocomplete = "off"/></td>
			  </tr>
			   <tr>
				<td class="tbltitle2">Skype: </td>
				<td><input size=10 type="text" name="skype" <?if(isset($_GET["edit_suport"])){?>value="<?php echo $rows['skype'];?>"<?}?> autocomplete = "off"/></td>
			  </tr>
		</table>
		<div class="but">
		<?if(isset($_GET["edit_suport"])){
		echo '<input type="submit" class="buttom" name="edit" value="Sửa" />';
		}
		else{
		echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';}
		?><input type="reset" class="reset" name="ok" value="Hủy" />
		
	</form>
	 </div>
 </div>
	