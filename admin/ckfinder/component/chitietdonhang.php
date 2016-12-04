<div id="tit_list">
<div id="txt"><p>Đơn hàng</p></div>
	<div id="process"> 
	<ul>
		<li><a class="close" href="?task=donhang">Đóng</a></li>
	</ul>
	</div>
</div>
	  <?php 
		include("connect.php");
		if(isset($_GET['id']))
			{
			$id=$_GET['id'];
			}
		$sql="select * from chitietdonhang INNER JOIN  simso on simso.ID=chitietdonhang.SimID WHERE chitietdonhang.DonHangID=$id";
		?>
		<?php
		$query=mysql_query($sql);
		?>
		<table class="table"  width=100%>
			<tr >
				<th>STT</th>
				<th>Số</th>
				<th>Đơn giá (VNĐ)</th>

			</tr>
			<?php
            $stt='';
			while($row=mysql_fetch_array($query)){
            $stt++;
			$so=$row['So'];
			$gia=$row['DonGia'];
            $tong=+$gia;
			?>
			<tr>
                <td><?php echo $stt;?></td>
			<td><?php echo $so;?></td><td><?php echo $gia;?></td>
			</tr>
			<?php
			}
			?>
</table>
<div class="total-cart">
    <?php $sql="select sum(`DonGia`) as total from chitietdonhang WHERE chitietdonhang.DonHangID=$id";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
        echo '<p class="total-cart">';
        echo "Tổng tiền thanh toán: ";
        echo number_format ($row['total'],0,'','.'). " VNĐ";
        echo '</p>';
    }

    ?>

    </div>
<?php
$sql="select TrangThai from thongtindonhang WHERE ID=$id";
$query=mysql_query($sql);
$r=mysql_fetch_array($query);
if($r['TrangThai']!=1){?>
    <a href="?task=chitietdonhang&id=<?php echo $id;?>&xacnhan=1" style="text-align: right; display: block; margin-top: 30px; font-size: 18px; color: blue; clear: both">Xác nhận đơn hàng</a>
<?php } else{ ?>
    <span style="text-align: right; display: block; margin-top: 30px; font-size: 18px; color: #232323; clear: both"> Đơn hàng đã được xác nhận</span>
<?php }?>
<?php if(isset($_GET['xacnhan'])){
    $date=date('Y-m-d H:i:s');
    $sql="UPDATE thongtindonhang set TrangThai='1' WHERE ID='$id'";
    $query=mysql_query($sql);
    $sql="UPDATE simso AS ss
        INNER JOIN chitietdonhang AS ct ON ss.ID = ct.SimID
        SET ss.DaBan ='1', ss.NgayBan ='$date'
        WHERE ct.DonHangID='$id'";
    $query=mysql_query($sql);
    echo"<script>document.location.href='?task=chitietdonhang&id=".$id."' </script>";
}?>