<?php
$stt='';
$strwhere='';
if(isset($_GET['reset'])){
    echo"<script>document.location.href='?com=reset' </script>";
}


$cata_id=isset($_GET['cata_id'])? $_GET['cata_id']:'';
$tag=isset($_GET['tag'])? $_GET['tag']:'';
if($cata_id!='') $strwhere=" AND `MaNhom`='$cata_id'";
if($tag!='') $strwhere=" AND `So`LIKE '%$tag%'";
if(isset($_POST['cmd_submit'])){
    $_SESSION['from1']=filter_var($_POST['txt_pricefrom'], FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['to1']=filter_var($_POST['txt_priceto'], FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['number1']=$_POST['txt_num'];
    $_SESSION['tong1']=$_POST['txt_tongdiem'];
    $_SESSION['nut1']=$_POST['txt_tongnut'];
    $_SESSION['type1']=isset($_POST['txt_type'])? $_POST['txt_type']:'';
}

$pricefrom=isset($_SESSION['from1'])? $_SESSION['from1']:'';
$priceto=isset($_SESSION['to1'])? $_SESSION['to1']:'';
$number=isset($_SESSION['number1'])? $_SESSION['number1']:'';
$tongdiem=isset($_SESSION['tong1'])? $_SESSION['tong1']:'';
$tongnut=isset($_SESSION['nut1'])? $_SESSION['nut1']:'';
$type=isset($_SESSION['type1'])? $_SESSION['type1']:'';
if($pricefrom!='')  $strwhere.=" AND DonGia >='$pricefrom'";
if($priceto!='')  $strwhere.=" AND DonGia <='$priceto'";
if($number!='')  $strwhere.=" AND `So` LIKE '%$number%'";
if($tongdiem!='')  $strwhere.=" AND `Tong` <='$tongdiem'";
if($tongnut!='')  $strwhere.=" AND `Nut` ='$tongnut'";
if($type!='')  $strwhere.=" AND `KieuSim` ='$type'";
?>
<div class="box">
    <h3 class="text-center head">Tìm kiếm sim</h3>
    <form id="search" class="box-item" action="" method="POST">
        <input name="do" value="search" type="hidden">
        <div class="row">
            <span class="line"></span>
            <div class="col-md-2">
                <img src="images/searchsim.png" alt="tim sim tai day" class="hidden-xs" style="margin-left: 10px;">
            </div>
            <div class="col-md-10 text-center">
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon font-12">
                                <strong> Giá từ:</strong>
                            </div>
                            <input name="txt_pricefrom" value="<?php echo $pricefrom;?>" class="form-control input-sm price font-b text-right" placeholder="100,000" onkeypress="return CheckNumeric();" onkeyup="FormatCurrency(this);"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon font-12"><strong>Đến:</strong></div>
                            <input name="txt_priceto" value="<?php echo $priceto;?>" class="form-control input-sm price font-b text-right" placeholder="10,000,000" onkeypress="return CheckNumeric();" onkeyup="FormatCurrency(this);">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix" style="margin-top: 20px"></div>
                <div class="form-group">
                    <span class="line"></span>
                    <span class="line"></span>
                    <div class="pull-left" style="width: 265px; padding-left: 15px">
                        <input onclick="this.value=''" name="txt_num" id="sim"  value="<?php echo $number;?>" class="form-control pull-left popover-dismiss" placeholder="Nhập số sim bạn cần tìm" data-container="body" data-toggle="popover" data-placement="bottom" data-content=" - Sử dụng dấu <span class='red'>x</span> đại điện cho 1 số và dấu <span class='red'>*</span> đại điện cho một chuỗi số. <br /> + Để tìm sim bắt đầu bằng 098, quý khách nhập vào 098*<br /> + Để tìm sim kết thúc bằng 888, quý khách nhập vào *888<br /> + Để tìm sim bắt đầu bằng 098 và kết thúc bằng 888, nhập vào 098*888<br /> + Để tìm sim bên trong có số 888, nhập vào 888<br /> + Để tìm sim bắt đầu bằng 098 và kết thúc bằng 808, 818, 828, 838, 848, 858, 868, 878, 888, 898 nhập vào 098*8x8<br /> " title="" data-original-title="Hướng dẫn tìm kiếm sim"></div>
                    <div class="text-center" >
                        <button class="btn btn-success font-b font-b fix-s pull-left" style="margin-left: 15px"> <i class="glyphicon glyphicon-search"></i> Tìm kiếm</button>
                        <a  class="btn btn-default" href="index.php?com=reset&id=<?php echo $cata_id;?>">Reset</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <strong class="font-12">Hot key:</strong>
                <span class="hotkey"><a href="0912*68" class="hotkey">0912*68</a>, <a href="090*888" class="hotkey">090*888</a>, <a href="0913*" class="hotkey">0913*</a>, <a href="*6688" class="hotkey">*6688</a>, <a href="01234*" class="hotkey">01234*</a>, <a href="09*99x99" class="hotkey">09*99x99</a>   </span></div>
        </div>
        <div class="col-md-12 text-left" style="margin-bottom: 6px">
            <span style="margin-top: -30px;" class="font-12"><strong style="color: #DE4A4A;">Tìm nâng cao</strong></a></span>
        </div>
        <div class="fullsearch text-center font-12" >

            <div class="form-inline"><span class="line"></span>
                <div class="input-group">
                    <div class="input-group-addon font-12">Tổng điểm:</div>
                    <input name="txt_tongdiem" maxlength="2" value="<?php echo $tongdiem;?>" class="form-control input-sm" placeholder=" < 81"></div>
                <div class="input-group">
                    <div class="input-group-addon font-12">Tổng Nút:</div>
                    <input name="txt_tongnut" maxlength="2"  value="<?php echo $tongnut;?>" class="form-control input-sm" placeholder=" 1 -10">
                </div>
            </div>
            <div class="text-center">
                <span class="line"></span>
                <input type="radio" value="10" name="txt_type" <?php if($type==10) echo 'checked';?>>Sim 10 số
                <input type="radio" value="11" name="txt_type" <?php if($type==11) echo 'checked';?>>Sim 11 số
            </div>
        </div>
        <input type="hidden" name="cmd_submit" value="true">
        <div class="clearfix"></div>
    </form>

</div>
<h3 class="head text-center">Kho sim</h3>
<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Số</th>
        <th>Đơn giá</th>
        <th>Tổng</th>
        <th>Mạng</th>
        <th>Mua</th>
    </tr>
    <?php

    $sql="select * FROM `simso` WHERE 1=1 AND DaBan='0' $strwhere ORDER BY ID DESC";
    $page=1;
    $positon=0;
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
        ?>
        <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $row['So'];?></td>
            <!--<td><?php /*echo $row['Tong'];*/?></td>-->
            <td><?php echo number_format ($row['DonGia'],0,'','.'). " VND";?></td>
            <td>1</td>
            <td>Vinaphone</td>
            <td class="box-btn text-center"><a class="btn btn-primary" href="<?php echo $url_cart;?>">Đặt mua</a> </td>
        </tr>
    <?php }?>
</table>
<div box-pagin>
    <div class="pagin pull-left">
        <?php
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        $url='sim';
        getNumPages($total_rows, $url, $num_record_show, $page);
        ?>
    </div>
    <div class="pull-right" style="margin-top: 6px">
        Tổng số: <?php echo $total_rows;?> Sim
    </div>
</div>

<div class="clearfix"></div>
<img src="images/banner.png" class="img-full">


