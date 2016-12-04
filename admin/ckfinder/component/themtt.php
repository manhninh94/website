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
            <li><a class="close" href="?task=tintuc">Đóng</a></li>
        </ul>
	</div>
</div>
<?php 
include("connect.php");
if(isset($_GET["sua_tintuc"]))
{
	$id_con=$_GET["id"];
	$sql="SELECT * FROM tintuc where ID='$id_con'";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_array($rs);
}?>
<div class="bor_them">
    <?php  include ("ckeditor/ckeditor.php");?>
    <div class="box-chuyenmuc">
        <form method="post" action="?task=tintuc" id="Form1" enctype="multipart/form-data">
            <div class="bor_them1">
                <input type="hidden" value="<?php echo $rows["ID"];?>" name="txt_id">
                <table class="tbl1">
                    <tr>
                        <td class="tbltitle">Tiêu đề: </td>
                        <td> <input size=10 type="text" name="txt_tieude" <?php if(isset($_GET["sua_tintuc"])){?>value="<?php  echo $rows["TieuDe"];?>"<?php }?>></td>
                    </tr>
                    <tr>
                        <td class="tbltitle2">Tác giả: </td>
                        <td><input size=10 type="text" name="txt_tacgia" <?php if(isset($_GET["sua_tintuc"])){?>value="<?php  echo $rows["TacGia"];?>"<?php }?>></td>
                    </tr>
                </table>
                <table class="tbl2">
                    <tr>
                        <td class="tbltitle2">Icon bài viết: </td>
                        <td><input type="file" name="file_up" <?php if(isset($_GET["sua_tintuc"])){?>value="<?php  echo $rows['HinhAnh'];?>"<?php }?>/></td><input type="hidden" name="linkimages" value="<?php  echo $rows['HinhAnh'];?>">
                    </tr>
                    <?php if(!isset($_GET['sua_tintuc']))
                    { ?>
                        <tr>
                            <td class="tbltitle">Nhóm tin:<span style="color:red;font-size:22px">*</span>  </td>
                            <td>
                                <?php
                                $sql="SELECT * FROM nhomtin";
                                $query=mysql_query($sql);
                                ?>
                                <select name="txt_nhomtin">
                                    <?php
                                    while($row=mysql_fetch_array($query))
                                    {
                                        ?>
                                        <option value="<?php  echo $row['ID'];?>"><?php  echo $row['TenNhom'];?></option>
                                    <?php
                                    }
                                    ?>
                            </td>
                        <tr/>
                    <?php }?>
                </table>
                </div>
                <p class="txt_add">Tóm tắt</p>
                <textarea id="txtContent" name="txt_tomtat" rows=5 cols=87 width=100%><?php if(isset($_GET["sua_tintuc"])){echo $rows["TomTat"];}?>
                </textarea>

                <p class="txt_add">Nội dung chi tiết</p>
                <div class="textarea">
                    <textarea name="txt_noidung" id="txt_noidung" rows="2" style="width:80%" ><?php if(isset($_GET["sua_tintuc"])){echo $rows['NoiDung'];}?></textarea>
                    <?php
                    $CKEditor = new CKEditor();
                    $CKEditor->basePath = 'ckeditor/';
                    $CKEditor->replace("txt_noidung");
                    ?>
                    </center>
                    <div class="but">
                        <?php if(isset($_GET["sua_tintuc"])){
                            ?>
                            <input type="submit" class="buttom" name="edit" value="Sửa bài" />
                        <?php
                        }
                        else{
                            echo '<input type="submit" class="buttom" name="addnew" value="Thêm mới" />';
                        }
                        ?>
                        <input type="reset" class="reset" name="huy" value="Hủy bỏ" />
                    </div>
                </div>
                <div style="clear:both"></div>


        </form>
    </div>

	