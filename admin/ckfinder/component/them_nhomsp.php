<script type="text/javascript">
function check_frmdangnhap(){
    if(document.frmdangnhap.MaCLsp.value == ""){
        alert("Hãy nhập Chủng loai!");
        document.frmdangnhap.MaCLsp.focus();
        return false;
    }
}
</script>
<div id="tit_list">
<div id="txt"><p>Thêm Nhóm Sim</p></div>
<?php if(admin()){ //*include("connect.php");* lỗi dòng 26 phần thêm nhóm sim?> 
	<div id="process"> 
	<ul>
        <li><a class="close" href="?task=nhomsp">Đóng</a></li>
	</ul>
	</div>
<?php }?>
</div>
<?php 
include("connect.php");
if(isset($_GET["sua_nhomsp"]))
{  
$id=$_GET["id"];
$sql="SELECT * FROM nhomsim where ID='$id'";
$rs=mysql_query($sql);
$rows=mysql_fetch_array($rs);
}
?> 
<div class="bor_them">
	<form action="?task=nhomsp" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
		<table class="tbl1">
             <input size=10 type="hidden" name="txtid" <?php if(isset($_GET["sua_nhomsp"])){?>value="<?php  echo $rows['ID'];?>"<?php }?> autocomplete = "off"/>
             <tr>
                <td class="tbltitle2">Tên Nhóm: <span style="color:red;font-size:22px">*</span> </td>
                <td><input size=10 type="text" name="txt_tennhom" <?php if(isset($_GET["sua_nhomsp"])){?>value="<?php  echo $rows['TenNhom'];?>"<?php }?> autocomplete = "off"/></td>
              </tr>
        </table>

		<div class="but"> 
            <?php if(isset($_GET["sua_nhomsp"])){
                echo '<input type="submit" class="buttom" name="edit" value="Sửa" />';
            }
            else{
                echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';
            }
            ?>
            <input type="reset" class="reset" name="ok" value="Hủy" />
        </div>
	</form>

</div>
	