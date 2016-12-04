<h3 class="head text-center" style="margin-top: 15px">Kho sim số đẹp</h3>
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
		require_once 'connect.php'
	?>
    <?php
    $strwhere=$stt='';
    $sql="select * FROM `simso` WHERE 1=1 AND DaBan='0'  ORDER BY DonGia DESC LIMIT 0,40";
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
<div class="clearfix"></div>
<img src="images/banner.png" class="img-full">

