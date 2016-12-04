
<div id="tit_list">
<div id="txt"><p>Nội dung Bài giới thiệu</p></div>
</div>

	<?php  include ("ckeditor/ckeditor.php");
$sql="SELECT * FROM tbl_about";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
?> 
<div class="bor_them">
<form action="?task=aboutus" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
	<table class="tbl4">
		<input type="hidden" size=10 name="id_foot" value="<?php echo $rows["id_foot"];?>"/>
		<tr>
			<td class="tbltitle1">Tiêu đề:</td>
			<td> <input type="text" size=30 name="title" value="<?php echo $rows["title"];?>"/></td>
		</tr>
		</table>
		<table class="tbl3">
		<tr>
		  <div class="textarea">
	 <textarea name="fulltext" id="txt_intro" rows="2" style="width:80%" ><?echo $rows['intro'];?></textarea>
		<?php 
			$CKEditor = new CKEditor();
			$CKEditor->basePath = 'ckeditor/';
			$CKEditor->replace("fulltext");
		?>
			</center>
		</tr>
	</table>
	<div class="but">
<input type="submit" class="buttom" name="edit" value="Ok" />
<input type="reset" class="reset" name="huy" value="Hủy" />
	 </div>
	</form>
	<?php 
	if(isset($_POST["edit"]))
	{
	function encodeHTML($sHTML)
    {
    $sHTML=ereg_replace("&","&amp;",$sHTML);
    $sHTML=ereg_replace("<","&lt;",$sHTML);
    $sHTML=ereg_replace(">","&gt;",$sHTML);
    return $sHTML;
    }
	$title=$_POST['title'];
 $tomtat=addslashes($_POST['fulltext']);
  $intro=encodeHTML($tomtat);
	$id=$_POST['id_foot'];
	$sql="UPDATE  tbl_about SET `id_foot` =  '".$id."',`title` =  '".$title."',
	`intro` ='".$intro."'
	where id_foot='".$id."'";
	mysql_query($sql);
	echo "<script>alert('Cập nhật thành công!');</script>";
	echo"<script>document.location.href='?task=aboutus' </script>";
	}
	?>

	