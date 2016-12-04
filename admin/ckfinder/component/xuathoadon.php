	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="../css/xuathoadon.css" rel="stylesheet" type="text/css">
<?php  
SESSION_START();
?>
</head>
<body>
<?php 
include("../../config.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}
?>
<div class="wapper">
    <div class="header">
            <div class="info">
            <?php 
            $sql="select * from thongtindonhang WHERE  ID='$id'";
            $query=mysql_query($sql);
            $rows=mysql_fetch_array($query);
            ?>
            <h3> Sim số đep</h3>
            <h4>MST: 76MT54</h4>
            </div>
            <div class="box-date">
                <p class="date">Hà Nội, Ngày <?php  echo date("d"); ?> Tháng <?php  echo date("m"); ?> Năm 20<?php  echo date("y"); ?><br>
            </p>
        </div>
    </div>
    <div class="body">
            <h2> Hóa Đơn Bán hàng</h2>
            <table class="tbl_left" border=0 cellspacing="0" cellpadding="0">
                    <tr>
                        <td width=30%><p>Họ và tên:</p></td>
                        <td width=70%><p><?php  echo $rows['HoTen']?></p></td>
                    </tr>
                    <tr>
                        <td width=30%><p>Địa chỉ:</p></td>
                        <td width=70%><p><?php  echo $rows['DiaChi']?></p></td>
                    </tr>
                    <tr>
                        <td width=30%><p>Điện thoại:</p></td>
                        <td width=70%><p><?php  echo $rows['DienThoai']?></p></td>
                    </tr>
            </table>
            <table class="tbl_right" border=0 cellspacing="0" cellpadding="0">
                    <tr>
                        <td width=40%><p>Hóa đơn số:</p></td>
                        <td width=60%><p>MSBD-<?php  echo $rows['ID']?></p></td>
                    </tr>
                        <tr>
                        <td width=40%><p>Thời gian:</p></td>
                        <td width=60%><p>
                            <?php 
                            $date = date("H:i:s d/m/Y", strtotime($rows['ThoiGian']));
                            ?>
                        </p></td>
                    </tr>
            </table>
            <div class="clear"></div>
            <table class="tbl_product" border=0 cellspacing="0" cellpadding="0" width=100%>
                <tr>
                    <td><p>Mã Sản phẩm</p></td>
                    <td><p>Tên sản phẩm</p></td>
                    <td><p>Tiền (VNĐ)</p></td>
                </tr>
                <?php 
                $sql1="select * from chitietdonhang INNER JOIN  simso on simso.ID=chitietdonhang.SimID WHERE chitietdonhang.DonHangID='$id'";
                $query=mysql_query($sql1);
                while($row=mysql_fetch_array($query))
                {
                ?>
                <tr>
                    <td><p><?php  echo $row['ID']?></p></td>
                    <td><p><?php  echo $row['So']?></p></td>
                    <td>
                    <p><?php  echo number_format ($row['DonGia'],0,'','.');?></p>
                    </td>
                </tr>
                <?php }?>
            </table>

            <table class="tbl_right-total" border=0 cellspacing="0" cellpadding="0">
                <tr>
                    <td width=50%><p>Tổng tiền hàng:</p></td>
                    <td width=50%><p>
                        <?php 
                        $sql="select sum(`DonGia`) as total from chitietdonhang WHERE chitietdonhang.DonHangID=$id";
                        $query=mysql_query($sql);
                        while($row=mysql_fetch_array($query)){
                        $tongtien=$row['total'];
                        echo number_format ($row['total'],0,'','.'). " VNĐ";
                        }
                        ?>
                    </p></td>
                </tr>
                    <tr>
                    <td><p>Thuế VAT (10%):</p></td>
                    <td>
                        <p><?php
                            $thue=(($tongtien*10)/100);
                            echo number_format ($thue,0,'','.'). " VNĐ";
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td ><p>Tổng tất cả:</p></td>
                    <td><p><?php  $tonggiatri=$tongtien + (($tongtien*10)/100); echo number_format ($tonggiatri,0,'','.'). " VNĐ";?></p></td>
                </tr>
            </table>
            <table class="tbl" border=0 cellspacing="0" cellpadding="0" width=100%>
                <tr>
                    <td width=20%><p>Người nhận</p></td>
                    <td width=20%><p>Thủ kho</p></td>
                    <td width=20%><p>Kế toán</p></td>
                    <td width=20%><p>Trường bộ phận</p></td>

                </tr>
            </table>
				
    </div>
    </div>
	
</body>