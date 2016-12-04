<div class="box" style="margin:20px 0px 0px 0px;padding:10px 0px 20px 10px;">
    <h4>Đôi nét về chúng tôi</h4>
    <?php
    $sql="select * from tintuc where ID='1'";
    $query=mysql_query($sql);
    $rows=mysql_fetch_array($query);
    ?>
    <div class="detail_content">
        <div class="fulltext" >
        <?php
        $fulltext=$rows['NoiDung']; /*** remove (/) slashes ***/
        echo html_entity_decode($fulltext);?>
        </div>
        <div class="author" >Tác giả:  <?php   echo $rows['TacGia'];?></div>
        <div class="clearfix"></div>
    </div>
</div>
<div style="margin-top: 15px">
    <img src="images/banner.png" class="img-full">
</div>
