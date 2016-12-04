<?php $obj="namsinh";
	   include("connect.php");	  
?>
<div id="tit_list">
    <div id="txt"><p>Đầu số sim</p></div>
    <?php if(admin()){?>
        <div id="process">
            <ul>
                <li><a href="?task=them_<?php echo $obj;?>" class="add">Thêm</a></li>
            </ul>
        </div>
    <?php }?>
</div>
<table border=0 class="table">
    <tr >
        <th>STT</th>

        <th>Đầu số</th>
        <?php if(admin()){?><th colspan=2 width=40px>Chức năng</th><?php }?>
    </tr>
    <?php
    $sql="select * from namsinh";
    $query=mysql_query($sql);
    $stt=0;
    while($row=mysql_fetch_array($query))
    {
        $stt++;
        echo '<tr><td>'.$stt.'</td>';
        echo "<td>".$row['NamSinh']."</td>";
        if(admin()){
            echo '<td><a href="?task=them_'.$obj.'&sua_'.$obj.'&id='.$row['ID'].'"><img src="images/iconsua.png" width=22px height=22px></a></td>';
            echo '<td><a href="?task='.$obj.'&delete='.$row['ID'].'"><img src="images/iconxoa.png" width=16px height=16px></a></td>';
        }
        echo '</tr>';
    }
    ?>
</table>
<?php
if(isset($_GET['delete']))/* xử lý xóa*/
{
    $sql="delete from namsinh where ID='".$_REQUEST['delete']."'";
    mysql_query($sql);
    echo"<script>document.location.href='?task=".$obj."' </script>";
}
if(isset($_POST['ok'])) /* xử lý thêm mới*/
{
    $tennhom=$_POST['txt_namsinh'];
    $sql="INSERT INTO namsinh VALUES('','$tennhom')";
    $query=mysql_query($sql,$con);
    echo"<script>document.location.href='?task=".$obj."' </script>";
}
if(isset($_POST["edit"]))/* xử lý  sửa*/
{
    $id=$_POST['txtid'];
    $tennhom=$_POST['txt_namsinh'];
    $sql="UPDATE  `namsinh` SET
	`namsinh` =  '".$tennhom."' WHERE `ID` ='".$id."'";
    mysql_query($sql);
    //echo $sql;
    echo"<script>document.location.href='?task=".$obj."' </script>";
}
mysql_close($con);
?>

