<?php
 include("connect.php");	 
$strwhere='';
if(isset($_POST['sub_search'])){
    $keyword=$_POST['keyword'];
    $strwhere="WHERE So like '%$keyword%'";
}
?>
<form class="loaimay" style="margin-top:15px" name="frmSearch" method="post" action="">
    <input type="text" style="padding:0px;margin:0px;height:25px;width:190px" name="keyword" size="20" />
    <input type="submit" value="Tìm kiếm" class="buttom" name="sub_search" />
    <a  class="all" href="?task=simso">Tất cả</a>
</form>
	
<form action="?task=simso" name="frm_process" method="POST">
    <div id="tit_list">
        <div id="txt"><p>Danh sách sản phẩm</p></div>
        <?php if(admin()){?>
            <div id="process">
            <ul>
                <li><a href="?task=them_simso" class="add">Thêm</a></li>
                <li><input type="submit" class="del" name="xoa" value="xóa" /></li>
            </ul>
            </div>
        <?php }?>
    </div>
    <table border=0 class="table">
        <tr>
            <th>Chọn</th>
            <th>Số</th>
            <th>Đơn giá</th>
        <?php if(admin()){?><th colspan=2>Chức năng</th><?php }?>
        </tr>
          <?php

          $so_banghi_hienthi=12;

            if(!isset($_GET['page']))
            {
                $_GET['page']=1;
            }
            $vitri=($_GET['page']-1)*$so_banghi_hienthi;
            $so_ban_ghi=mysql_num_rows(mysql_query("SELECT * FROM `simso` $strwhere"));
             $sql="SELECT * FROM simso $strwhere ORDER BY `ID` DESC LIMIT $vitri,$so_banghi_hienthi";
            $tong_so_trang=floor($so_ban_ghi/$so_banghi_hienthi)+1;
            $trang=$tong_so_trang-1;
            $query=mysql_query($sql);
            ?>
            <form id="frm_checkbox" method="POST" action="?task=simso&check">
            <?php
            while($row=mysql_fetch_array($query))
            {
            ?><tr>
            <td><input class="checkbox" type="checkbox" name="chk[]" value="<? echo $row['ID']; ?>"></td>
            <td><?php echo  $row['So'];?></td>
            <td><?php echo number_format ($row['DonGia'],0,'','.'). " VND";?></td>

            <?php if(admin()){
            echo '<td><a href="?task=them_simso&sua_simso&ID='.$row['ID'].'"><img src="images/iconsua.png" width=22px height=22px></a></td>';
            echo '<td><a href="?task=simso&delete='.$row['ID'].'"><img src="images/iconxoa.png" width=18px height=18px></a></td>';
            }
            echo '</tr>';
    }
    ?>
    </table>
    <?php if(!isset($_GET['search'])){?>
        <div class="boc_phantrang">
        <div class="phantrang">
        <ul>
        <?php
        if(!isset($_GET['page']))
        {
        $_GET['page']=1;
        }
         else
        { $page = $_GET['page']; }
        settype($page, "int");
        $sotrang_hienthi=5;
        if($tong_so_trang>=$sotrang_hienthi)
        {
            $so_record_ht=$tong_so_trang/$sotrang_hienthi;// hiển thị giới hạn số trang... sau đó có n
            //echo $so_record_ht;

             //echo $i;
        if($page>1)
        {
             echo '<li><a href="?task=simso&page='.($_GET['page']-1).'" class="but_nextview">Prev</a></li>';
        }
        if($page>=4)
        {
        echo '<li><a href="">...</a></li>';
        }
        if($page>2&& $page+2<=$tong_so_trang)
        {
            $i = $page - 2;
            $n = $page + 2;
            for($i;$i <= $n;$i++){
            if($i!=$page) {
                   echo '<li><a href="?task=simso&page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li><a href="?task=simso&page='.$i.'" class="active">'.$i.'</a></li>';
                }

            }
        }
        elseif($page==$tong_so_trang||$page==$tong_so_trang-1)
        {
            for($i=$tong_so_trang-4;$i <= $tong_so_trang;$i++){
            if($i!=$page) {
                   echo '<li><a href="?task=simso&page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li><a href="?task=simso&page='.$i.'" class="active">'.$i.'</a></li>';
                }
                }
        }
        else
        {
            for($i=1;$i <=$sotrang_hienthi;$i++){
            if($i!=$page) {
                   echo '<li><a href="?task=simso&page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li><a href="?task=simso&page='.$i.'" class="active">'.$i.'</a></li>';
                }
            }
        }
        if($page>=5&&$page<$tong_so_trang-2)
        {
        echo '<li><a href="">...</a></li>';
        }
        if($page<$tong_so_trang)
        {
             echo '<li><a href="?task=simso&page='.($_GET['page']+1).'" class="but_nextview">Next</a></li>';
        }
        }
        else
        {
            for($i=1;$i <=$tong_so_trang;$i++){
            if($i!=$page) {
                   echo '<li><a href="?task=simso&page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li><a href="?task=simso&page='.$i.'" class="active">'.$i.'</a></li>';
                }
            }
        }
    ?>
    </ul>
	</div>
		<?php echo"page".$_GET['page']." of ".$tong_so_trang."";?>
</form>
<?php }?>
	<?php 
	if(isset($_GET['delete']))
	{
		$sql="delete from simso where ID='".$_REQUEST['delete']."'";
		mysql_query($sql);
    	echo"<script>document.location.href='?task=simso' </script>";
	}
		   
if(isset($_POST['ok']))
{	
	$so=$_POST['txt_simso'];
	$total= array_sum(str_split($so));
	$nut= substr($total,1);
    $dongia=$_POST['txt_dongia'];
    $manhom=$_POST['txt_manhom'];
    $kieu = strlen(filter_var($so, FILTER_SANITIZE_NUMBER_INT));
    $sql="SELECT count(ID) as count FROM `simso` WHERE `So`='$so'";
    $query=mysql_query($sql);/* kiem tra sim da dc nhap hay chua*/
    $rw=mysql_fetch_array($query);
    if($rw['count'] <1){
        $sql="INSERT INTO `simso`(`MaNhom`, `So`, `DonGia`,`Tong`, `Nut`, `KieuSim`)
        VALUES
        ('$manhom','$so','$dongia', '$total','$nut','$kieu')";
            mysql_query($sql,$con);
        echo"<script>document.location.href='?task=simso' </script>";
    }
    else {echo"<script>alert('Nhập trùng số sim. Vui lòng nhập lại')</script>";
    echo"<script>document.location.href='?task=them_simso' </script>";
    }
}

?>
<?php 
if(isset($_POST["edit"]))
{
    $id=$_POST['txt_id'];
    $so=$_POST['txt_simso'];
    $dongia=$_POST['txt_dongia'];
    $manhom=$_POST['txt_manhom'];
	$sql="UPDATE  `simso` SET
	`So` ='".$so."',
	`DonGia` ='".$dongia."',
	`MaNhom` ='".$manhom."'
	where ID='".$id."'";
	//echo $sql;
	mysql_query($sql);
	echo"<script>document.location.href='?task=simso' </script>";
	
}
?>
<?php  // xử lý xóa button
if(isset($_POST["xoa"]))
{
$count=count($_POST['chk']);//dem so phan tu
  foreach($_POST['chk'] as $vl)
 {
        //  echo $vl;
      $sql="delete from simso where ID=$vl";
    mysql_query($sql);
    // echo $sql;
    }
    echo"<script>document.location.href='?task=simso' </script>";
}
?>
<?php  // xử lý hot
if(isset($_GET["active"]))
{
$id=$_GET['active'];//dem so phan tu
	  $sql="UPDATE simso SET active= if(active=0,1,0) WHERE ID='$id'";
	mysql_query($sql);
echo"<script>document.location.href='?task=simso' </script>";
  
}
?>