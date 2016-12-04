<script type="text/javascript">
function check_frmdangnhap(){
if(document.frmdangnhap.MaCLsp.value == ""){
    alert("Hãy nhập Chủng laoi!");
    document.frmdangnhap.MaCLsp.focus();
    return false;
}
</script>
<div id="tit_list">
<div id="txt"><p>Thêm Nhóm tin</p></div>
<?php if(admin()){?>
	<div id="process"> 
	<ul>
        <li><a class="close" href="?task=nhomtin">Đóng</a></li>
	</ul>
	</div>
<?php }?>
</div>
<?php 
if(isset($_GET["sua_nhomtin"]))
{
$id=$_GET["id"];
$sql="SELECT * FROM nhomtin where ID='$id'";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
}?> 
<div class="bor_them">
	<form action="?task=nhomtin" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
		<table class="tbl1">
             <input size=10 type="hidden" name="txtid" <?php if(isset($_GET["sua_nhomtin"])){?>value="<?php  echo $rows['ID'];?>"<?php }?> autocomplete = "off"/>
             <tr>
                <td class="tbltitle2">Nhóm tin: </td>
                <td><input size=10 type="text" name="txt_tennhom" <?php if(isset($_GET["sua_nhomtin"])){?>value="<?php  echo $rows['TenNhom'];?>"<?php }?> autocomplete = "off"/></td>
              </tr>
		</table>
		<div class="but">
            <?php if(isset($_GET["sua_nhomtin"])){
            echo '<input type="submit" class="buttom" name="edit" value="Sửa" />';
            }
            else{
            echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';}
            ?><input type="reset" class="reset" name="ok" value="Hủy" />
        </div>
	</form>

</div>
	