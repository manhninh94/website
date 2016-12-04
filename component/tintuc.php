<div class="box box-item">
    <h4>Tin tức</h4>
    <?php
    $strwhere=$stt='';
    $sql="select * FROM `tintuc` WHERE ID not in ('1')";
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
        $url_content="index.php?com=chitiettintuc&id=".$row['ID'];
        ?>
        <div class="list-media">
            <a href="<?php echo $url_content;?>"><img class="media-object" src="<?php echo $row['HinhAnh'];?>" alt="..."></a>
            <h4 class="media-heading"><a href="<?php echo $url_content;?>"><?php echo $row['TieuDe'];?></a></h4>
            <?php echo $row['TomTat'];?>
            <div class="clearfix"></div>
        </div>
    <?php }?>
<?php
$url='';
$num_record_show=20;
$page=1;
getNumPages($total_rows, $url, $num_record_show, $page);?>
<div class="clearfix"></div>
</div>
<div style="margin-top: 15px">
    <img src="images/banner.png" class="img-full">
</div>