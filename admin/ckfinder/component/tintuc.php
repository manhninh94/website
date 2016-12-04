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
    <form action="?task=<?php echo $_GET["task"];?>" name="frm_process" method="POST">
        <div id="tit_list">
            <div id="txt"><p>Quản lý tin tức</p></div>
            <?php if(admin()){
				include("connect.php");
				?>
            <div id="process">
            <ul>
                <li><a href="?task=add_contents" class="add">Thêm</a></li>
                <li><input type="submit" class="del_all" name="xoa" value="xóa" /></li>
                    </ul>
            </div>
            <?php }?>
        </div>
        <table border=0 class="table">
            <tr>
                <?php if($_SESSION['level']==1){ echo'<th width="5%">Chọn</th>';}?>
                <th width="35%">Tiêu đề</th>
                <th width="15%">Tác giả</th>
                <?php if($_SESSION['level']==1)
                {?>
                <th width="25%">Thời gian đăng</th>
                <th width="10%">Hiển thị</th>
                <th width="10%" colspan=2>Chức năng</th>
                <?php }?>
            </tr>
              <?php
                 if(isset($_GET["search"])&&$_POST["search"]!=0)
                {

                }
                  $sql="SELECT * FROM `tintuc`";
                $query=mysql_query($sql);
                 mysql_query("SET NAMES 'UTF8'");
                while($row=mysql_fetch_array($query))
                {
                if($_SESSION['level']==1){?><td><input class="checkbox" type="checkbox" name="chk[]" value="<?php  echo $row['ID']; ?>"></td><?php }?>
                <?php
                $str =$row["TieuDe"];
                $str = strip_tags($str); //Lược bỏ các tags HTML
                if(strlen($str)>50)
                    { //Đếm kí tự chuỗi $str, 100 ở đây là chiều dài bạn cần quy định
                    $strCut = substr($str, 0, 50); //Cắt 50 kí tự đầu
                    $str = substr($strCut, 0, strrpos($strCut, ' ')).' ...'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
                    }
                echo"<td>".$str."</td>";
                echo"<td>".$row['TacGia']."</td>";
                ?>
                <td>
                <?php
                $ngay=$row["NgayTao"];
                $dd=substr($ngay,11,8);
                echo $dd;
                ?> -
                <?php
                $sqldate = strtotime($row['NgayTao']);
                $date = date('d-m-Y', $sqldate);
                echo $date; //Ngày - Tháng - Năm
                ?>
                </td>
                <?php if(admin()){?>
                <td>
                <?php
                    if($row['TrangThai']==0){
                        echo '<a href="?task='.$_GET["task"].'&no_active='.$row['ID'].'"><img src="images/an.png" width=12px height=12px></a>';
                    }else{
                        echo '<a href="?task='.$_GET["task"].'&active='.$row['ID'].'"><img src="images/but_ok.jpg" width=12px height=12px></a>';
                     }
                ?></td>
                <td><a href="?task=them_tintuc&sua_tintuc&id=<?php echo $row['ID'];?>"><img src="images/iconsua.png" width=22px height=22px></a></td>
                <td><a href="?task=<?php echo $_GET["task"];?>&delete=<?php echo $row['ID'];?>"><img src="images/iconxoa.png" width=16px height=16px></a></td>
                <?php }?>
                </tr>
        <?php
        }
        ?>
        </table>
        </form>
            <?php
            if(isset($_GET['delete']))
            {
                $sql="delete from tintuc where ID='".$_REQUEST['delete']."'";
                mysql_query($sql);
			    echo"<script>document.location.href='?task=".$_GET["task"]."' </script>";
            }

			if(isset($_POST['addnew']))
			{
			   if ($_FILES["file_up"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["file_up"]["error"] . "<br />";
					}
				  else
					{
					if (file_exists("../images/" . $_FILES["file_up"]["name"]))
					  {
					  echo $_FILES["file_up"]["name"] . " da ton tai file tren server. ";
					  }
					else
					  {
					  move_uploaded_file($_FILES["file_up"]["tmp_name"],
					  "../images/" . $_FILES["file_up"]["name"]);
					  }
					}
				$link_img="images/" . $_FILES["file_up"]["name"];
			    $nhomtin=$_POST["txt_nhomtin"];// bài viết thuộc nhóm tin   (mã nhóm tin)
			    $tieude=$_POST["txt_tieude"];
                $tomtat=$_POST["txt_tomtat"];
			    $tacgia=$_POST["txt_tacgia"];
			   $str =str_replace(" ", "-", $str);// replate khoang trang = dau -
				$str=strtolower($str);// bo viet hoa
				function encodeHTML($sHTML)
				{
				$sHTML=ereg_replace("&","&amp;",$sHTML);
				$sHTML=ereg_replace("<","&lt;",$sHTML);
				$sHTML=ereg_replace(">","&gt;",$sHTML);
				return $sHTML;
				}
                $noidung=encodeHTML($_POST['txt_noidung']);

				$sql2="INSERT INTO `tintuc`(`MaNhom`, `TieuDe`, `TomTat`, `NoiDung`, `TacGia`, `HinhAnh`, `TrangThai`, `Luotxem`, `NgayTao`) VALUES
				('$nhomtin','$tieude','$tomtat','$noidung','$tacgia','$link_img','1','1',NOW())";
				echo $sql2;
				mysql_query($sql2,$con);
			echo"<script>document.location.href='?task=tintuc' </script>";
			}
			?>
			<?php
			if(isset($_POST["edit"]))
			{
				$id=$_POST['txt_id'];
                $nhomtin=$_POST["txt_nhomtin"];// bài viết thuộc nhóm tin   (mã nhóm tin)
                $tieude=$_POST["txt_tieude"];
                $tomtat=$_POST["txt_tomtat"];
                $tacgia=$_POST["txt_tacgia"];
                $str =str_replace(" ", "-", $str);// replate khoang trang = dau -
                $str=strtolower($str);// bo viet hoa
                function encodeHTML($sHTML)
                {
                    $sHTML=ereg_replace("&","&amp;",$sHTML);
                    $sHTML=ereg_replace("<","&lt;",$sHTML);
                    $sHTML=ereg_replace(">","&gt;",$sHTML);
                    return $sHTML;
                }
                $noidung=encodeHTML($_POST['txt_noidung']);
				if($_FILES["file_up"]["name"]!="")//nếu chọn ảnh đường dẫn
				{
				 if ($_FILES["file_up"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["file_up"]["error"] . "<br />";
					}
				  else
					{
					if (file_exists("../images/" . $_FILES["file_up"]["name"]))
					  {
					  echo $_FILES["file_up"]["name"] . " da ton tai file tren server. ";
					  }
					else
					  {
					  move_uploaded_file($_FILES["file_up"]["tmp_name"],
					  "../images/" . $_FILES["file_up"]["name"]);
					  }
					}
				$link = "images/" . $_FILES["file_up"]["name"];
				}
				else{
					$link=$_POST['linkimages'];// nếu chưa chọn thì ảnh vẫn là ảnh cũ
				}
				$sql="UPDATE  tintuc SET
				`TieuDe` ='".$tieude."',
				`TomTat` ='".$tomtat."',
				`NoiDung` ='".$noidung."',
				`TacGia` ='".$tacgia."',
				`HinhAnh` ='".$link."'
				WHERE ID='".$id."'";
               // echo $sql;
				mysql_query($sql);
                echo"<script>document.location.href='?task=contents'</script>";
			}

			if(isset($_GET["active"])){
            $id=$_GET["active"];
                $sql="UPDATE `tintuc` SET `TrangThai` ='0' WHERE ID='$id'";
                mysql_query($sql);
                echo"<script>document.location.href='?task=".$_GET["task"]."' </script>";
            }
            if(isset($_GET["no_active"]))
            {
            $id=$_GET["no_active"];
                $sql="UPDATE `tintuc` SET `TrangThai` ='1' WHERE ID='$id'";
                mysql_query($sql);
                echo"<script>document.location.href='?task=".$_GET["task"]."' </script>";
            }
			?>


			<?php  // xử lý xóa button
			if(isset($_POST["xoa"]))
			{
			$count=count($_POST['chk']);//dem so phan tu

			  foreach($_POST['chk'] as $vl)
			 {
					  echo $vl;
					$sql="delete from tintuc where ID=$vl";
					mysql_query($sql);

			}
			echo"<script>document.location.href='?task=".$_GET["task"]."'</script>";

			}

			?>
			<?php

mysql_close($con);
?>

