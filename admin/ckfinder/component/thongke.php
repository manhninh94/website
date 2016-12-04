<?php
include("connect.php");
$stt='';
$strwhere=" AND DaBan='1'";
if(isset($_POST['txt_submit'])){
    $_SESSION['date1']=$_POST['txt_date1'];
    $_SESSION['date2']=$_POST['txt_date2'];
}

$date1=isset($_SESSION['date1'])? $_SESSION['date1']:'';
$date2=isset($_SESSION['date2'])? $_SESSION['date2']:'';

if($date1!='')  $strwhere.=" AND NgayBan >='$date1'";
if($date2!='')  $strwhere.=" AND NgayBan <='$date2'";


function phantram_loinhuan($gia){/* lợi nhuận % lấy ra từ bảng cauhinhloinhuan*/
    $sql="select * FROM `cauhinhloinhuan`";
    $query=mysql_query($sql);
    mysql_query("SET NAMES 'UTF8'");
    while($rows=mysql_fetch_array($query)){
        $tugia=$rows['TuGia'];
         $dengia=$rows['DenGia'];
        if($gia>=$tugia && $gia < $dengia) return $rows['PhanTram'];
    }

}
?>
<div class="box">
<h2 class="text-center head">Thống kê doanh số bán sim</h2>
<form action="" method="POST">
    <table>
        <tr>
            <td><span>Từ ngày: </span>
                <input type="date" value="<?php echo $date1;?>" name="txt_date1">
            </td>
            <td><span>Đến ngày: </span>
                <input type="date" value="<?php echo $date2;?>" name="txt_date2">
            </td>
            <td>
                <input type="submit" value="Tra cứu" name="txt_submit" style="width: 80px; text-align: center">
            </td>
        </tr>
    </table>
</form>
<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Số</th>
        <th>Giá bán</th>
        <th>% lãi</th>
        <th>Khoản lãi (Thành tiền)</th>
    </tr>
    <?php
    $sql="select * FROM `simso` WHERE 1=1 $strwhere ORDER BY ID DESC";
	$page=1;
	$positon=0;
    $tong=0;
	$num_record_show=20;// số bản ghi trên trang
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
		$positon=($page-1)*$num_record_show;
	}
	$limit=' LIMIT '.$positon.','.$num_record_show;
	 $query=mysql_query($sql);
    $total_rows=mysql_num_rows($query);
	$sql.=$limit;
    $query1=mysql_query($sql);
    mysql_query("SET NAMES 'UTF8'");
    while($row=mysql_fetch_array($query1)){
        $stt++;
        $url_cart="index.php?com=giohang&add=".$row['ID'];
        $lai=phantram_loinhuan($row['DonGia']);
        $tienlai=$lai*$row['DonGia']*0.01;
        ?>
        <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $row['So'];?></td>
            <td><?php echo number_format ($row['DonGia'],0,'','.'). " VND";?></td>
            <td><?php echo $lai;?> % </td>
            <td><?php echo number_format ($tienlai, 0,'','.'). " VND";?></td>
            <?php $tong+=$tienlai;?></php>
        </tr>
    <?php }?>
</table>
<p style="font-size: 18px; margin-top: 20px; color: red; text-align: right"> Tổng lãi: <?php echo number_format ($tong,0,'','.'). " VND";?></p>
<div box-pagin>
    <div class="pagin" style="text-align: center">
        <?php
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        $url='thongke';
        getNumPages($total_rows, $url, $num_record_show, $page);
        ?>
        <br>
        Tổng số bản ghi: <?php echo $total_rows;?>
    </div>
</div>
<div class="clearfix" style="clear: both"></div>
</div>
