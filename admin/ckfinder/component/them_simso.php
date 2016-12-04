<?php
$so='0966742962';
//echo array_sum(str_split($number));

	echo $total= array_sum(str_split($so));
	echo $nut= substr($total,1);
?> 
<script type="text/javascript">
function doSearch()
{
    document.frm_search.submit();
}
function check_frmdangnhap(){
    if(document.frmdangnhap.tensp.value == ""){
        alert("Hãy nhập Tên sản phẩm!");
        document.frmdangnhap.tensp.focus();
        return false;
    }
    if(document.frmdangnhap.manhom.value == ""){
        alert("Hãy nhập Mã SP!");
        document.frmdangnhap.manhom.focus();
        return false;
    }
    if(document.frmdangnhap.nhasx.value == ""){
        alert("Hãy nhập Nhà SX");
        document.frmdangnhap.nhasx.focus();
        return false;
    }
    if(document.frmdangnhap.dongia.value == ""){
        alert("Hãy nhập Giá SP!");
        document.frmdangnhap.dongia.focus();
        return false;
    }
}
</script>
<?php 
if(isset($_GET["sua_simso"]))
{
    $id=$_GET["ID"];
    $sql="SELECT * FROM simso WHERE ID='$id'";
    //echo $sql;
    $rs=mysql_query($sql);
    $rows=mysql_fetch_array($rs);
    $cata_id=$rows['MaNhom'];
}?>
<div id="tit_list">
<div id="txt"><p><?php if(isset($_GET["sua_simso"])){echo "Sửa Số Sim"; }else{echo "Thêm mới sim";}?></p></div>
    <div id="process">
    <ul>
        <li><a class="close" href="?task=simso">Đóng</a></li>
    </ul>
    </div>
</div>
<div class="bor_them">
	 <form action="?task=simso" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
		<?php if(isset($_GET["sua_simso"])){?>
			<input size=10 type="hidden" name="txt_id" autocomplete = "off" value="<?php  echo $rows['ID'];?>">
		<?php }?>
		
		<table class="tbl1">
			<tr>
				<td class="tbltitle">Số:<span style="color:red;font-size:22px">*</span>  </td>
			   <td> <input size=10 type="number" min=0  name="txt_simso" autocomplete = "off" <?php if(isset($_GET["sua_simso"])){?>value="<?php  echo $rows['So'];?>"<?php }?>></td>
			 </tr>
			<tr>
				<td class="tbltitle2">Đơn giá: </td>
				<td><input size=10 type="text" name="txt_dongia" <?php if(isset($_GET["sua_simso"])){?>value="<?php  echo $rows['DonGia'];?>"<?php }?> autocomplete = "off"/></td>
			</tr>
		</table>
		<table class="tbl2">
			<tr>
				<td class="tbltitle2">Thuộc nhóm: </td>
				<td>
                <?php
                $sql="SELECT * FROM `nhomsim`";
                $query=mysql_query($sql);
                ?>
                <select name="txt_manhom">
                    <?php
                    while($row=mysql_fetch_array($query))
                    {
                        ?>
                        <option value="<?php echo $row['ID'];?>" <?php if(isset($_GET["sua_simso"]) && $row['ID']==$cata_id) echo 'selected';?>><?php  echo $row['TenNhom'];?></option>
                    <?php
                    }
                    ?>
				</td>
				
			</tr>
		 </table>
		 <div class="clear"></div>
		<div class="but">
			<?php if(isset($_GET["sua_simso"])){
				?>
				<input type="submit" class="buttom" name="edit" value="Sửa" />
				<?php 
			}
			else
			{
			echo '<input type="submit" class="buttom" name="ok" value="Thêm mới" />';
			}
			?>
			<input type="reset" class="reset" name="ok" value="Hủy bỏ" />
		 </div>
	</form>
 </div>
	