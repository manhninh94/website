
<div class="box box-item">
        <h4>Giỏ hàng của bạn</h4>
            <script>$(document).ready(function(c) {
                    $('.close1').on('click', function(c){
                        $('.cart-header').fadeOut('slow', function(c){
                            $('.cart-header').remove();
                        });
                    });
                });
            </script>
            <?php
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            if(isset($_GET['add'])){ // them vao gio hang
			$id=intval($_GET['add']);
                $sql = mysql_query("SELECT * FROM simso WHERE ID ='$id' AND TrangThai='0'");
				//echo $sql;
                $rs = mysql_fetch_assoc($sql);
                if($rs){// kiểm tra xem sim đã được đặt hay chưa
                    //$rs['qty'] = 1;
                    $_SESSION['cart'][$rs['ID']] = $rs;
					
                }
				else{
					echo "<script>alert('Sim này đã có người đặt mua. Bạn vui lòng chọn sim khác')</script>";
					 echo"<script>document.location.href='index.php' </script>";
				}
				
            }
            if(isset($_GET['delete'])){ // xoa 1 item gio hang
                if($_SESSION['cart'][$_GET['delete']]) unset($_SESSION['cart'][$_GET['delete']]);
                echo"<script>document.location.href='index.php?com=giohang' </script>";
            }

            ?>
            <?php
            $count=count($_SESSION['cart']);
            if($count>=1)
            {?>
            <form class="form-horizontal frm" method="post">
            <table class="cart table table-bordered" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Xóa</th>
                </tr>
                <?php
                foreach($_SESSION['cart'] as $ID=>$rs){
                    ?>
                    <tr>
                        <td align="center"><?php echo $rs['So'];?></td>
                        <td align="center"><?php echo $rs['DonGia'];?>VND</td>
                        <td align="center"><a href="index.php?com=giohang&delete=<?php echo $rs['ID'];?>"><img src="images/iconxoa.png" width=15px height=15px></a></td>
                    </tr>
                <?php }?>
            </table>

            <div class="text-right clearfix">
                <a class="btn btn-primary pull-right" href="index.php">Mua thêm sim khác ></a>
            </div>
             <h4>Nhập thông tin thanh toán</h4>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Họ và tên(*)</label>
                    <div class="col-sm-9">
                        <input name="txt_hoten" class="form-control" id="" placeholder="Họ và tên" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Điện thoại(*)</label>
                    <div class="col-sm-9">
                        <input name="txt_dienthoai" class="form-control" id="" placeholder="Điện thoại" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Địa chỉ(*)</label>
                    <div class="col-sm-9">
                        <input name="txt_diachi" class="form-control" id="" placeholder="Địa chỉ" equired="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ghi chú</label>
                    <div class="col-sm-9">
                        <textarea name="txt_ghichu" style="min-height: 80px" class="form-control" placeholder="Ghi chú của bạn"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="cmd_search" class="btn btn-success">Gửi đi</button>
                    </div>
                </div>
            </form>
            <?php  }else{
                ?>
                <h3 class="h3-cart text-center">Giỏ hàng trống!</h3>
            <?php
            }
            ?>
</div>
<div class="box box-item">
    <h3>Hướng dẫn mua sim:</h3>

    Chúng tôi luôn luôn nỗ lực không ngừng nhằm mang đến sự tiện ích cho Quý khách hàng, đặc biệt là vấn đề thanh toán chúng tôi có hai hình thức thanh toán để quý khách lựa chọn.<br/>

    1. Hình thức thanh toán trực tiếp cho nhân viên chuyển phát hoặc nhân viên của chúng tôi khi mang sim tới giao quý khách.(Áp dụng toàn quốc)<br/>

    2. Hình thức thanh toán qua chuyển khoản và nhận sim qua đường chuyển phát nhanh của Bưu Điện. (Áp dụng toàn quốc)<br/>

    Đối với Quý khách ở TP. Hà Nội chỉ cần đặt hàng qua website hoặc gọi điện cho chúng tôi để đặt hàng Quý khách sẽ được nhân viên của chúng tôi mang sim tới giao tận nơi Quý khách yêu cầu trong thời gian sớm nhất thường là 15-30 phút từ khi quý khách nhận được phản hồi từ nhân viên hỗ trợ của chúng tôi.<br/>

    Đối với Quý khách ở các tỉnh thành khác chỉ cần đặt hàng qua website điền đầy đủ, chính xác thông tin yêu cầu khi đặt hàng Quý khách sẽ được nhân viên hỗ trợ của chúng tôi gọi điện xác nhận, hỗ trợ và tiến hành chuyển sim tới địa chỉ Quý khách đã cung cấp, Quý khách sẽ nhận được sim sau 1-3 ngày tính từ khi chúng tôi chuyển sim cho Quý khách, thời gian nhận sim phụ thuộc vào địa chỉ Quý khách cung cấp, sau khi Quý khách nhận được sim quý khách có thể thanh toán trực tiếp cho nhân viên chuyển phát mang sim tới giao cho quý khách.<br/>
</div>
<?php if(isset($_POST['cmd_search'])){
    /* them vao chi tiet don hang*/
    if(!count($_SESSION['cart'])) header('location:index.php?com=checkout');
        /* them vao thong tin dat hang*/
        $hoten=$_POST['txt_hoten'];
        $dienthoai=$_POST['txt_dienthoai'];
        $diachi=$_POST['txt_diachi'];
        $ghichu=$_POST['txt_ghichu'];
        $ngay=date('Y-m-d H:i:s');
        $sql="INSERT INTO `thongtindonhang`( `HoTen`, `DienThoai`, `DiaChi`, `GhiChu`, `ThoiGian`) VALUES ('$hoten', '$dienthoai', '$diachi','$ghichu', '$ngay')";
        mysql_query($sql) or die(mysql_error());
        $order_id = mysql_insert_id(); /* lấy ra id của bảng đơn hàng vừa insert*/
        if($order_id){
            foreach($_SESSION['cart'] as $rs){
                mysql_query("INSERT INTO lesson_order_detail(orderid,name,proid,price,qty,total) VALUES($order_id,'".$rs['TenSP']."','".$rs['MaSP']."','".$rs['DonGia']."','".$rs['qty']."','$total')");
                $sim_id=$rs['ID'];
                $so=$rs['So'];
                $dongia=$rs['DonGia'];
                $sql="INSERT INTO `chitietdonhang`(`DonHangID`, `SimID`, `So`, `DonGia`) VALUES ('$order_id', '$sim_id','$so','$dongia')";
                mysql_query($sql) or die(mysql_error());
				$sql="UPDATE simso set TrangThai='1' where ID=".$sim_id;
				 mysql_query($sql);
            }
            unset($_SESSION['cart']);
           echo"<script>document.location.href='?com=hoanthanh' </script>";
    }
}
?>