<script type="text/javascript">
function check_frmdangnhap(){
if(document.frmdangnhap.MaCLsp.value == ""){
    alert("Hãy nhập Chủng loai!");
    document.frmdangnhap.MaCLsp.focus();
    return false;
}
</script>
<div id="tit_list">
<div id="txt"><p>Thêm Chuyên mục sản phẩm</p></div>
<?php if(admin()){?>
	<div id="process"> 
	<ul>
		<li><a href="?task=them_chuyenmuc" class="add">Thêm</a></li>
	</ul>
	</div>
<?php }?>
</div>
<?php 
if(isset($_GET["sua_chuyenmuc"]))
{
$id=$_GET["id"];
$sql="SELECT * FROM chuyenmucsanpham where ID='$id'";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
}?> 
<div class="bor_them">
	<form action="?task=chungloai" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
		<table class="tbl1">
             <input size=10 type="hidden" name="txtid" <?php if(isset($_GET["sua_chuyenmuc"])){?>value="<?php  echo $rows['ID'];?>"<?php }?> autocomplete = "off"/>
             <tr>
                <td class="tbltitle2">Chuyên mục: </td>
                <td><input size=10 type="text" name="txt_tencm" <?php if(isset($_GET["sua_chuyenmuc"])){?>value="<?php  echo $rows['TenCM'];?>"<?php }?> autocomplete = "off"/></td>
              </tr>
		</table>
		<div class="but">
            <?php if(isset($_GET["sua_chuyenmuc"])){
            echo '<input type="submit" class="buttom" name="edit" value="Sửa" />';
            }
            else{
            echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';}
            ?><input type="reset" class="reset" name="ok" value="Hủy" />
        </div>
	</form>

</div>
	