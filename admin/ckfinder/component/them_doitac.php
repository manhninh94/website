<script type="text/javascript">
	function doSearch()
	{
	document.frm_search.submit();
	}
	function doProcess()
	{
	document.frm_process.submit();
	}
</script>

<div id="tit_list">
<div id="txt"><p>Thêm mới</p></div>
	<div id="process"> 
	<ul>
		<li><a class="close" href="?task=contents">Đóng</a></li>
	</ul>
	</div>
</div>
<?
if(isset($_GET["edit_contents"]))
{
	$id_con=$_GET["id"];
	$sql="SELECT * FROM tbl_contents where con_id='$id_con'";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_array($rs);
	}?> 
	<form action="?task=doitac" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
	<div class="bor_them">
	<?php include ("ckeditor/ckeditor.php");?>
	<div class="box-chuyenmuc">
	 <input type="hidden" value="<?echo $rows["con_id"];?>" name="con_id">
<table class="tbl1">
		<tr>
			<td class="tbltitle">Tên đối tác: </td>
		   <td> <input size=10 type="text" name="title" <?if(isset($_GET["edit_contents"])){?>value="<?php echo $rows["title"];?>"<?}?>></td>
		</tr>
		
	</table>
		<table class="tbl2">
	   <tr>
		<td class="tbltitle2">Logo: </td>
			<td><input type="file" name="file_up" <?if(isset($_GET["edit_contents"])){?>value="<?php echo $rows['icon'];?>"<?}?>/></td><input type="hidden" name="linkimages" value="<?php echo $rows['icon'];?>">
	  </tr>
	 
 </table>

<p class="txt_add">Sơ lược về đối tác</p>
  <textarea id="txtContent" name="txtContent" rows=5 cols=87 width=100%><?if(isset($_GET["edit_contents"])){echo $rows["intro"];}?>
  </textarea>

  <div class="but">
	<?if(isset($_GET["edit_contents"])){
		?>
		<input type="submit" class="buttom" name="edit" value="Sửa bài" />
		<?
	}
	else
	{
	echo '<input type="submit" class="buttom" name="addnew" value="Thêm mới" />';
	}
	?>
	<input type="reset" class="reset" name="huy" value="Hủy bỏ" />

	</div>
	</form>
	 </div>
</div>

	